<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';

    protected $fillable = ['videotitle', 'desc', 'image', 'link', 'catevideo_id'];

    public $timestamps = false;

    public function catevideo()
    {
    	return $this->belongTo('App\CateVideo');
    }
}
