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
        $data = [ 'content' => 'They are _______tennis' ];
        \App\Question::create($data);
        $data = [ 'content' => 'What do you do _______your free time?' ];
        \App\Question::create($data);
        $data = [ 'content' => 'How _______does she read ?' ];
        \App\Question::create($data);
        $data = [ 'content' => 'We go to the zoo_______a month' ];
        \App\Question::create($data);
        $data = [ 'content' => ' My mother _______jogging every morning' ];
        \App\Question::create($data);
        $data = [ 'content' => '_______he like sports ?' ];
        \App\Question::create($data);
        $data = [ 'content' => 'What about _______by bike' ];
        \App\Question::create($data);
        $data = [ 'content' => '_______are you going to do tonight ?' ];
        \App\Question::create($data);
        $data = [ 'content' => ' Mai _______cool weather' ];
        \App\Question::create($data);
        $data = [ 'content' => 'Which sports does he play ?' ];
        \App\Question::create($data);


        $data = [ 'content' => ' What was the matter with him? He........ a toothache' ];
        \App\Question::create($data);
        $data = [ 'content' => 'What subject is he......... now? Vietnamese.' ];
        \App\Question::create($data);
        $data = [ 'content' => '........... did she go yesterday morning? She went to the bookshop.' ];
        \App\Question::create($data);
        $data = [ 'content' => 'Are you free........ the evening? Yes, I am.' ];
        \App\Question::create($data);
        $data = [ 'content' => 'She is going to......... television tonight.' ];
        \App\Question::create($data);
        $data = [ 'content' => '........... is that ? Its my teacher.' ];
        \App\Question::create($data);
        $data = [ 'content' => 'Does she like sandwiches ?' ];
        \App\Question::create($data);
        $data = [ 'content' => 'This is Mai.............. mother is a doctor.' ];
        \App\Question::create($data);
        $data = [ 'content' => 'She............. a banana. ' ];
        \App\Question::create($data);
        $data = [ 'content' => ' What is it ? It is......' ];
        \App\Question::create($data);


    }
}
