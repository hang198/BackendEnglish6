<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function questions() {
        return $this->belongsTo('App\Question');
    }
    public function point_answers() {
        return $this->hasMany('App\Point_answer');
    }
}
