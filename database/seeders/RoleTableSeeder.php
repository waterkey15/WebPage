<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
           'name'=>'admin',
           'description'=>'System admin',
           'is_main'=> 1,
           'is_show_admin'=>1,
            'guard_name' => 'web'

        ]);
        Role::create([
            'name'=>'editor',
            'description'=>'System editor',
            'is_main'=> 1,
            'is_show_admin'=>1,
            'guard_name' => 'web'

        ]);
        Role::create([
            'name'=>'user',
            'description'=>'User',
            'is_main'=> 1,
            'is_show_admin'=>0,
            'guard_name' => 'web'

        ]);
    }
}
