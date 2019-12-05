<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theory extends Model
{
    public function videos() {
        return $this->belongsTo('App\Video');
    }
}
