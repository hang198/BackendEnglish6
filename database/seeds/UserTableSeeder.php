<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['name' => 'hang',
            'email' => 'hang@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(12345678),
            'role_id' => 1]);

        \App\User::create(['name' => 'anh',
            'email' => 'hang123@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(12345678),
            'role_id' => 2]);
    }
}
