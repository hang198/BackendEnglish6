<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function users() {
        return $this->belongsTo('App\User');
    }
    public function practices() {
        return $this->belongsTo('App\Practice');
    }
    public function point_answers() {
        return $this->hasMany('App\Point_answer');
    }
}
