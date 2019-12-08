<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id','content','correct'];
    public function questions() {
        return $this->belongsTo('App\Question');
    }
    public function points() {
        return $this->belongsToMany('App\Point','point_answers','answer_id','point_id');
    }
}
