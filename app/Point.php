<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

    protected $primaryKey = 'id';
    protected $fillable = ['point', 'practice_id', 'user_id'];
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    public function practice() {
        return $this->belongsTo('App\Practice');
    }
    public function answers() {
        return $this->belongsToMany('App\Answer','point_answers', 'point_id', 'answer_id');
    }
    public function selected() {
        return $this->hasMany('App\Point_answer');
    }

}
