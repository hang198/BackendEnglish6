<?php

use Illuminate\Database\Seeder;

class CateStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $catestory = new \App\CateStory();
        $catestory->title = 'Góc truyện cười';
        $catestory->desc = 'Tuyển tập truyện cười khiến bạn cười bể bụng';
        $catestory->image = 'truyencuoi.jpg';
        $catestory->type = '1';
        $catestory->order = '1';
        $catestory->save();
        $catestory = new \App\CateStory();
        $catestory->title = 'Góc truyện ngụ ngôn';
        $catestory->desc = 'Tuyển tập những truyện ngụ ngôn hay nhất mọi thời đại';
        $catestory->image = 'ngungon.jpg';
        $catestory->type = '2';
        $catestory->order = '2';
        $catestory->save();
        $catestory = new \App\CateStory();
        $catestory->title = 'Góc truyện cổ tích';
        $catestory->desc = 'Tuyển tập những truyện cổ tích hay nhất mọi thời đại';
        $catestory->image = 'cotich.jpg';
        $catestory->type = '3';
        $catestory->order = '3';
        $catestory->save();
        $catestory = new \App\CateStory();
        $catestory->title = 'Góc truyện ngắn';
        $catestory->desc = 'Tuyển tập những truyện ngắn hay nhất mọi thời đại';
        $catestory->image = '';
        $catestory->type = '4';
        $catestory->order = '4';
        $catestory->save();
    }
}
