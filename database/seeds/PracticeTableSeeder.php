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
        $practice = \App\Practice::create(['name' => 'Toán 1', 'lesson_id' => 1]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $practice = \App\Practice::create(['name' => 'Toán 2', 'lesson_id' => 2]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $practice = \App\Practice::create(['name' => 'Toán 3', 'lesson_id' => 3]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $practice = \App\Practice::create(['name' => 'Toán 4', 'lesson_id' => 4]);
        $practice->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    }
}
