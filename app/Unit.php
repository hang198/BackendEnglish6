<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name','image'];
    public function lessons() {
        return $this->hasMany('App\Lesson');
    }
}
