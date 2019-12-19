<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    protected $table = 'stories';

    protected $fillable = ['storytitle', 'content', 'image', 'catestory_id'];

    public $timestamps = false;

    public function catestory()
    {
    	return $this->belongTo('App\CateStory');
    }

}
