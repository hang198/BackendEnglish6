<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new \App\Unit();
        $unit->name = 'UNIT 1: MY NEW SCHOOL';
        $unit->image = 'images/course_1.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 2: MY HOME';
        $unit->image = 'images/course_2.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 3: MY FRIENDS';
        $unit->image = 'images/course_3.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 4: MY NEIGHBOURHOOD';
        $unit->image = 'images/course_4.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 5: NATURAL WONDERS';
        $unit->image = 'images/course_5.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 6: OUR TET HOLIDAY';
        $unit->image = 'images/course_6.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 7: TELEVISION';
        $unit->image = 'images/course_7.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 8: SPORTS AND GAMES';
        $unit->image = 'images/course_8.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 9:CITIES';
        $unit->image = 'images/course_9.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 10: OUR HOUSES';
        $unit->image = 'images/course_10.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 11: OUR GREENER WORLD';
        $unit->image = 'images/course_11.jpg';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 12: ROBOTS';
        $unit->image = 'images/course_12.jpg';
        $unit->save();
    }
}
