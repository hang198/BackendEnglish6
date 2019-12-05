<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    public function practice_questions() {
        return $this->hasMany('App\Practice_question');
    }
    public function points() {
        return $this->hasMany('App\Point');
    }
    public function lessons() {
        return $this->belongsTo('App\Lesson');
    }
}
