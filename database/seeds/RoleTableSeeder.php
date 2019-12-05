<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = 'Admin';
        $role->slug = \Illuminate\Support\Str::slug('admin');
        $role->save();
        $role->permissions()->attach([1,2,3,4]);

        $role = new \App\Role();
        $role->slug = \Illuminate\Support\Str::slug('user');;
        $role->name = 'User';
        $role->save();
        $role->permissions()->attach([4]);
    }
}
