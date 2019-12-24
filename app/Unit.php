<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = ['name','name_vi','image'];
    public function lessons() {
        return $this->hasMany('App\Lesson', 'unit_id');
    }
}
