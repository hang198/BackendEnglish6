<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateStory extends Model
{
    protected $table = 'catestory';

    protected $fillable = ['catesto_title', 'desc', 'image', 'order', 'type'];

    public $timestamps = false;

    public function story()
    {
    	return $this->hasMany('App\Stories');
    }
}