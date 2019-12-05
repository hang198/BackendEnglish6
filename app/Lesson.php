<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function units() {
        return $this->belongsTo('App\Unit');
    }
    public function practices() {
        return $this->belongsTo('App\Lesson');
    }
}
