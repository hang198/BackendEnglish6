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
        $unit->name = 'unit1';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'unit2';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'unit3';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'unit4';
        $unit->save();
    }
}
