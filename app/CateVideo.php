<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateVideo extends Model
{
    protected $table = 'catevideo';

    protected $fillable = ['catevi_title', 'desc', 'image', 'type', 'order'];

    public $timestamps = false;

    public function video()
    {
    	return $this->hasMany('App\Videos');
    }
}
