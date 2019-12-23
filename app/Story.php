<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';

    protected $fillable = ['title', 'content', 'image', 'catestory_id'];

    public $timestamps = false;

    public function catestory()
    {
    	return $this->belongTo('App\CateStory');
    }

}
