<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['content' => '2', 'correct' => 1, 'question_id' => 1];
        \App\Answer::create($data);
        $data = ['content' => '3', 'correct' => 0, 'question_id' => 1];
        \App\Answer::create($data);


        $data = ['content' => '3', 'correct' => 1, 'question_id' => 2];
        \App\Answer::create($data);
        $data = ['content' => '4', 'correct' => 0, 'question_id' => 2];
        \App\Answer::create($data);



        $data = ['content' => '4', 'correct' => 1, 'question_id' => 3];
        \App\Answer::create($data);
        $data = ['content' => '5', 'correct' => 0, 'question_id' => 3];
        \App\Answer::create($data);



        $data = ['content' => '5', 'correct' => 1, 'question_id' => 4];
        \App\Answer::create($data);
        $data = ['content' => '6', 'correct' => 0, 'question_id' => 4];
        \App\Answer::create($data);



        $data = ['content' => '6', 'correct' => 1, 'question_id' => 5];
        \App\Answer::create($data);
        $data = ['content' => '7', 'correct' => 0, 'question_id' => 5];
        \App\Answer::create($data);



        $data = ['content' => '7', 'correct' => 1, 'question_id' => 6];
        \App\Answer::create($data);
        $data = ['content' => '8', 'correct' => 0, 'question_id' => 6];
        \App\Answer::create($data);



        $data = ['content' => '8', 'correct' => 1, 'question_id' => 7];
        \App\Answer::create($data);
        $data = ['content' => '9', 'correct' => 0, 'question_id' => 7];
        \App\Answer::create($data);



        $data = ['content' => '9', 'correct' => 1, 'question_id' => 8];
        \App\Answer::create($data);
        $data = ['content' => '10', 'correct' => 0, 'question_id' => 8];
        \App\Answer::create($data);



        $data = ['content' => '10', 'correct' => 1, 'question_id' => 9];
        \App\Answer::create($data);
        $data = ['content' => '11', 'correct' => 0, 'question_id' => 9];
        \App\Answer::create($data);



        $data = ['content' => '11', 'correct' => 1, 'question_id' => 10];
        \App\Answer::create($data);
        $data = ['content' => '12', 'correct' => 0, 'question_id' => 10];
        \App\Answer::create($data);

    }
}
