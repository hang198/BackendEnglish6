<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new \App\Permission();
        $permission->slug = \Illuminate\Support\Str::slug('editor');
        $permission->name = 'editor';
        $permission->save();
        $permission = new \App\Permission();
        $permission->slug = \Illuminate\Support\Str::slug('delete');
        $permission->name = 'delete';
        $permission->save();
        $permission = new \App\Permission();
        $permission->slug = \Illuminate\Support\Str::slug('create');
        $permission->name = 'create';
        $permission->save();
        $permission = new \App\Permission();
        $permission->slug = \Illuminate\Support\Str::slug('read');
        $permission->name = 'read';
        $permission->save();


    }
}
