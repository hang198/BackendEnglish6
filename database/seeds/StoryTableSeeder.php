<?php

use Illuminate\Database\Seeder;

class StoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $story = new \App\Story();
        $story->title = 'The Frog Prince';
        $story->content = 'One fine evening a young princess ...';
        $story->image = 'frog.jpg';
        $story->catestory_id = '1';
        $story->save();
        $story = new \App\Story();
        $story->title = 'Puppies For Sale';
        $story->content = 'A store owner was tacking ...';
        $story->image = 'puppies.jpg';
        $story->catestory_id = '2';
        $story->save();
        $story = new \App\Story();
        $story->title = 'Who You Are Makes a Difference';
        $story->content = 'One night a man came home to his ...';
        $story->image = 'latenight.jpg';
        $story->catestory_id = '3';
        $story->save();
        $story = new \App\Story();
        $story->title = 'Heaven and Hell';
        $story->content = 'They went to the next room ...';
        $story->image = 'ngungon.jpg';
        $story->catestory_id = '4';
        $story->save();
    }
}
