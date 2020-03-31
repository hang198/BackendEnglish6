<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateStory extends Model
{
    protected $table = 'catestory';

    protected $fillable = ['title', 'desc', 'image', 'order'];

    public $timestamps = false;

    public function story()
    {
    	return $this->hasMany('App\Stories');
    }
}
