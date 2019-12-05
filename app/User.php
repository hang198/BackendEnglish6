<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function hasPermission($ability){
        $role = $this->role;
        $permissions = $role->permissions;
        foreach ($permissions as $permission){
            if ($permission->slug === $ability){
                return true;
            };
        }
        return false;
    }

    public function practices()
    {
        return $this->belongsToMany('App\Practice', 'points', 'user_id', 'practice_id');
    }
    public function points() {
        return $this->hasMany('App\Point', 'user_id');
    }
    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }
}
