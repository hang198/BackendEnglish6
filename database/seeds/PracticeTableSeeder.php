<?php

use Illuminate\Database\Seeder;

class PracticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $practice = \App\Practice::create(['name' => 'Luyện tập bài 1', 'lesson_id' => 1]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $practice = \App\Practice::create(['name' => 'Luyện tập bài 2', 'lesson_id' => 2]);
        $practice->questions()->attach([11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);
        $practice = \App\Practice::create(['name' => 'Luyện tập bài 3', 'lesson_id' => 3]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 15, 5, 19, 11]);
        $practice = \App\Practice::create(['name' => 'Luyện tập bài 4', 'lesson_id' => 4]);
        $practice->questions()->attach([1, 12, 3, 14, 5, 16, 7, 8, 19, 10]);
    }
}
