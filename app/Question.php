<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content'];
    public function answers() {
        return $this->hasMany('App\Answer');
    }
    public function practices() {
        return $this->belongsToMany('App\Practice', 'practice_questions', 'question_id','practice_id');
    }

}
