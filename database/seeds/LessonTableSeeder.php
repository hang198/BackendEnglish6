<?php

use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new \App\Lesson();
        $lesson->name = 'lesson1';
        $lesson->content = 'content1';
        $lesson->unit_id = '1';
        $lesson->save();
        $lesson = new \App\Lesson();
        $lesson->name = 'lesson2';
        $lesson->content = 'content2';
        $lesson->unit_id = '1';
        $lesson->save();
        $lesson = new \App\Lesson();
        $lesson->name = 'lesson3';
        $lesson->content = 'content3';
        $lesson->unit_id = '2';
        $lesson->save();
        $lesson = new \App\Lesson();
        $lesson->name = 'lesson4';
        $lesson->content = 'content4';
        $lesson->unit_id = '3';
        $lesson->save();
    }
}
