<?php

use Illuminate\Database\Seeder;

class CateVideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catevideo = new \App\CateVideo();
        $catevideo->title = 'Âm nhạc';
        $catevideo->desc = 'Tuyển tập những ca khúc tiếng anh hay nhất';
        $catevideo->image = 'amnhac.jpg';
        $catevideo->type = '1';
        $catevideo->order = '1';
        $catevideo->save();
        $catevideo = new \App\CateVideo();
        $catevideo->title = 'Phim hoạt hình';
        $catevideo->desc = 'Tuyển tập những bộ phim hoạt hình song ngữ hay nhất';
        $catevideo->image = 'cartoon.jpg';
        $catevideo->type = '2';
        $catevideo->order = '2';
        $catevideo->save();
        $catevideo = new \App\CateVideo();
        $catevideo->title = 'Thế giới động vật';
        $catevideo->desc = 'Tuyển tập những tập phim về động vật sinh động nhất';
        $catevideo->image = 'animalworld.jpg';
        $catevideo->type = '3';
        $catevideo->order = '3';
        $catevideo->save();
        $catevideo = new \App\CateVideo();
        $catevideo->title = 'Chương trình tivi';
        $catevideo->desc = 'Tuyển tập những chương trình dành cho thiếu nhi bằng tiếng anh hay nhất';
        $catevideo->image = 'tvshow.jpg';
        $catevideo->type = '4';
        $catevideo->order = '4';
        $catevideo->save();
    }
}
