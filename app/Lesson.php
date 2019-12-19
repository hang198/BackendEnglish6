<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['name','content','unit_id'];
    public function unit() {
        return $this->belongsTo('App\Unit','unit_id');
    }
    public function practice() {
        return $this->hasOne('App\Practice','lesson_id');
    }
}
