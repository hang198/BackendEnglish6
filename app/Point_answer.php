<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point_answer extends Model
{
    public function points() {
        return $this->belongsTo('App\Point');
    }
    public function answers() {
        return $this->belongsTo('App\Answer');
    }
}
