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
        $data = ['content' => 'play' , 'correct' => 1 , 'question_id' => 1];
        \App\Answer::create($data);
        $data = ['content' => 'to playing' , 'correct' => 0 , 'question_id' => 1];
        \App\Answer::create($data);
        $data = ['content' => 'played' , 'correct' => 0 , 'question_id' => 1];
        \App\Answer::create($data);
        $data = ['content' => 'plays' , 'correct' => 0 , 'question_id' => 1];
        \App\Answer::create($data);
        $data = ['content' => 'in' , 'correct' => 1 , 'question_id' => 2];
        \App\Answer::create($data);
        $data = ['content' => 'at' , 'correct' => 0 , 'question_id' => 2];
        \App\Answer::create($data);
        $data = ['content' => 'to' , 'correct' => 0 , 'question_id' => 2];
        \App\Answer::create($data);
        $data = ['content' => 'on' , 'correct' => 0 , 'question_id' => 2];
        \App\Answer::create($data);
        $data = ['content' => 'many' , 'correct' => 0 , 'question_id' => 3];
        \App\Answer::create($data);
        $data = ['content' => 'often' , 'correct' => 1 , 'question_id' => 3];
        \App\Answer::create($data);
        $data = ['content' => 'long' , 'correct' => 0 , 'question_id' => 3];
        \App\Answer::create($data);
        $data = ['content' => 'far' , 'correct' => 0 , 'question_id' => 3];
        \App\Answer::create($data);
        $data = ['content' => 'one' , 'correct' => 0 , 'question_id' => 4];
        \App\Answer::create($data);
        $data = ['content' => 'one time' , 'correct' => 0 , 'question_id' => 4];
        \App\Answer::create($data);
        $data = ['content' => 'once' , 'correct' => 1 , 'question_id' => 4];
        \App\Answer::create($data);
        $data = ['content' => 'once time' , 'correct' => 0 , 'question_id' => 4];
        \App\Answer::create($data);
        $data = ['content' => 'does' , 'correct' => 0 , 'question_id' => 5];
        \App\Answer::create($data);
        $data = ['content' => 'go' , 'correct' => 0 , 'question_id' => 5];
        \App\Answer::create($data);
        $data = ['content' => 'goes' , 'correct' => 1 , 'question_id' => 5];
        \App\Answer::create($data);
        $data = ['content' => 'playing' , 'correct' => 0 , 'question_id' => 5];
        \App\Answer::create($data);
        $data = ['content' => 'does' , 'correct' => 1 , 'question_id' => 6];
        \App\Answer::create($data);
        $data = ['content' => 'do' , 'correct' => 0 , 'question_id' => 6];
        \App\Answer::create($data);
        $data = ['content' => 'why' , 'correct' => 0 , 'question_id' => 6];
        \App\Answer::create($data);
        $data = ['content' => 'when' , 'correct' => 0 , 'question_id' => 6];
        \App\Answer::create($data);
        $data = ['content' => 'go' , 'correct' => 0 , 'question_id' => 7];
        \App\Answer::create($data);
        $data = ['content' => 'to go' , 'correct' => 0 , 'question_id' => 7];
        \App\Answer::create($data);
        $data = ['content' => 'going' , 'correct' => 1 , 'question_id' => 7];
        \App\Answer::create($data);
        $data = ['content' => 'goes' , 'correct' => 0 , 'question_id' => 7];
        \App\Answer::create($data);
        $data = ['content' => 'what' , 'correct' => 1 , 'question_id' => 8];
        \App\Answer::create($data);
        $data = ['content' => 'who' , 'correct' => 0 , 'question_id' => 8];
        \App\Answer::create($data);
        $data = ['content' => 'which' , 'correct' => 0 , 'question_id' => 8];
        \App\Answer::create($data);
        $data = ['content' => 'when' , 'correct' => 0 , 'question_id' => 8];
        \App\Answer::create($data);
        $data = ['content' => 'like' , 'correct' => 0 , 'question_id' => 9];
        \App\Answer::create($data);
        $data = ['content' => 'likes' , 'correct' => 1 , 'question_id' => 9];
        \App\Answer::create($data);
        $data = ['content' => 'to like' , 'correct' => 0 , 'question_id' => 9];
        \App\Answer::create($data);
        $data = ['content' => 'liking' , 'correct' => 0 , 'question_id' => 9];
        \App\Answer::create($data);
        $data = ['content' => 'He plays table tennis ' , 'correct' => 1 , 'question_id' => 10];
        \App\Answer::create($data);
        $data = ['content' => ' he is playing table tennis' , 'correct' => 0 , 'question_id' => 10];
        \App\Answer::create($data);
        $data = ['content' => ' He is going to play table tennis' , 'correct' => 0 , 'question_id' => 10];
        \App\Answer::create($data);
        $data = ['content' => 'yes , he does' , 'correct' => 0 , 'question_id' => 10];
        \App\Answer::create($data);


        $data = ['content' => 'to have' , 'correct' => 1 , 'question_id' => 11];
        \App\Answer::create($data);
        $data = ['content' => 'have' , 'correct' => 0 , 'question_id' => 11];
        \App\Answer::create($data);
        $data = ['content' => 'has' , 'correct' => 0 , 'question_id' => 11];
        \App\Answer::create($data);
        $data = ['content' => 'had' , 'correct' => 0 , 'question_id' => 11];
        \App\Answer::create($data);
        $data = ['content' => 'to learn' , 'correct' => 1 , 'question_id' => 12];
        \App\Answer::create($data);
        $data = ['content' => 'learning' , 'correct' => 0 , 'question_id' => 12];
        \App\Answer::create($data);
        $data = ['content' => 'learn' , 'correct' => 0 , 'question_id' => 12];
        \App\Answer::create($data);
        $data = ['content' => 'learned' , 'correct' => 0 , 'question_id' => 12];
        \App\Answer::create($data);
        $data = ['content' => 'What' , 'correct' => 1 , 'question_id' => 13];
        \App\Answer::create($data);
        $data = ['content' => 'Where' , 'correct' => 0 , 'question_id' => 13];
        \App\Answer::create($data);
        $data = ['content' => 'When' , 'correct' => 0 , 'question_id' => 13];
        \App\Answer::create($data);
        $data = ['content' => 'Why' , 'correct' => 0 , 'question_id' => 13];
        \App\Answer::create($data);
        $data = ['content' => 'in' , 'correct' => 1 , 'question_id' => 14];
        \App\Answer::create($data);
        $data = ['content' => 'on' , 'correct' => 0 , 'question_id' => 14];
        \App\Answer::create($data);
        $data = ['content' => 'at' , 'correct' => 0 , 'question_id' => 14];
        \App\Answer::create($data);
        $data = ['content' => 'to' , 'correct' => 0 , 'question_id' => 14];
        \App\Answer::create($data);
        $data = ['content' => 'sing' , 'correct' => 1 , 'question_id' => 15];
        \App\Answer::create($data);
        $data = ['content' => 'play' , 'correct' => 0 , 'question_id' => 15];
        \App\Answer::create($data);
        $data = ['content' => 'stay' , 'correct' => 0 , 'question_id' => 15];
        \App\Answer::create($data);
        $data = ['content' => 'watch' , 'correct' => 0 , 'question_id' => 15];
        \App\Answer::create($data);
        $data = ['content' => 'What' , 'correct' => 1 , 'question_id' => 16];
        \App\Answer::create($data);
        $data = ['content' => 'Who' , 'correct' => 0 , 'question_id' => 16];
        \App\Answer::create($data);
        $data = ['content' => 'Where' , 'correct' => 0 , 'question_id' => 16];
        \App\Answer::create($data);
        $data = ['content' => 'How' , 'correct' => 0 , 'question_id' => 16];
        \App\Answer::create($data);
        $data = ['content' => 'Yes, she do ' , 'correct' => 1 , 'question_id' => 17];
        \App\Answer::create($data);
        $data = ['content' => 'Yes, she is' , 'correct' => 0 , 'question_id' => 17];
        \App\Answer::create($data);
        $data = ['content' => 'Yes, she does' , 'correct' => 0 , 'question_id' => 17];
        \App\Answer::create($data);
        $data = ['content' => 'Yes, she like' , 'correct' => 0 , 'question_id' => 17];
        \App\Answer::create($data);
        $data = ['content' => 'his' , 'correct' => 1 , 'question_id' => 18];
        \App\Answer::create($data);
        $data = ['content' => 'she' , 'correct' => 0 , 'question_id' => 18];
        \App\Answer::create($data);
        $data = ['content' => 'her' , 'correct' => 0 , 'question_id' => 18];
        \App\Answer::create($data);
        $data = ['content' => 'his' , 'correct' => 0 , 'question_id' => 18];
        \App\Answer::create($data);
        $data = ['content' => 'wants' , 'correct' => 1 , 'question_id' => 19];
        \App\Answer::create($data);
        $data = ['content' => 'want' , 'correct' => 0 , 'question_id' => 19];
        \App\Answer::create($data);
        $data = ['content' => 'to want' , 'correct' => 0 , 'question_id' => 19];
        \App\Answer::create($data);
        $data = ['content' => 'wants' , 'correct' => 0 , 'question_id' => 19];
        \App\Answer::create($data);
        $data = ['content' => 'eraser' , 'correct' => 0 , 'question_id' => 20];
        \App\Answer::create($data);
        $data = ['content' => 'an eraser' , 'correct' => 0 , 'question_id' => 20];
        \App\Answer::create($data);
        $data = ['content' => 'erasers ' , 'correct' => 0 , 'question_id' => 20];
        \App\Answer::create($data);
        $data = ['content' => 'a eraser' , 'correct' => 1 , 'question_id' => 20];
        \App\Answer::create($data);

    }
}
