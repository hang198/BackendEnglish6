<?php

use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = new \App\Video();
        $video->title = 'Faliz Navidad';
        $video->link = 'https://www.youtube.com/embed/KzV_UCQFY6w';
        $video->image = 'feliz.jpg';
        $video->catevideo_id = '1';
        $video->save();
        $video = new \App\Video();
        $video->title = 'Tom and Jerry';
        $video->link = 'https://www.youtube.com/embed/ATNg2rhb8qY';
        $video->image = 'tom.jpg';
        $video->catevideo_id = '2';
        $video->save();
        $video = new \App\Video();
        $video->title = 'Baby Birds Grow Up';
        $video->link = 'https://www.youtube.com/embed/MgEU1DP7tIw';
        $video->image = 'amnhac.jpg';
        $video->catevideo_id = '3';
        $video->save();
        $video = new \App\Video();
        $video->title = 'The debate';
        $video->link = 'https://www.youtube.com/embed/ZgnxS-n4wY4';
        $video->image = 'heaven.jpg';
        $video->catevideo_id = '4';
        $video->save();
    }
}
