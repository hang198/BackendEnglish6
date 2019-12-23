<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = ['title', 'image', 'link', 'catevideo_id'];

    public $timestamps = false;

    public function catevideo()
    {
    	return $this->belongTo('App\CateVideo');
    }
}
