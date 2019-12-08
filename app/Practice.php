<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    public function questions() {
        return $this->belongsToMany('App\Question','practice_questions','practice_id','question_id');
    }
    public function points() {
        return $this->hasMany('App\Point');
    }
    public function lessons() {
        return $this->belongsTo('App\Lesson');
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'points', 'practice_id', 'user_id');
    }
}
