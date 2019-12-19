<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $primaryKey = 'id';
    protected $fillable = ['name','content','unit_id'];
    public function unit() {
        return $this->belongsTo('App\Unit');
    }
    public function practice() {
        return $this->hasOne('App\Practice','lesson_id');
    }
}
