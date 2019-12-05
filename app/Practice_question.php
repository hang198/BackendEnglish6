<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice_question extends Model
{
    public function questions() {
        return $this->belongsTo('App\Answer');
    }
    public function practices() {
        return $this->belongsTo('App\Practice');
    }
}
