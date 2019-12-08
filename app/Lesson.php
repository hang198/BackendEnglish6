<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name','content'];
    public function unit() {
        return $this->belongsTo('App\Unit');
    }
    public function practice() {
        return $this->hasOne('App\Practice');
    }
}
