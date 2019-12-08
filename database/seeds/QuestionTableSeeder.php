<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['content' => '1 + 1 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 2 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 3 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 4 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 5 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 6 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 7 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 8 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 9 = ?'];
        \App\Question::create($data);
        $data = ['content' => '1 + 10 = ?'];
        \App\Question::create($data);
    }
}
