<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        User::create([
//           'name'=>'Mehmet',
//            'email'=>'mehmet@mehmet.com',
//            'password'=>bcrypt('12345678')
//        ]);
//        User::create([
//            'name'=>'Ahmet',
//            'email'=>'ahmet@ahmet.com',
//            'password'=>bcrypt('12345678')
//        ]);
//        User::create([
//            'name'=>'Huseyin',
//            'email'=>'huseyin@huseyin.com',
//            'password'=>bcrypt('12345678')
//        ]);
//        User::create([
//            'name'=>'Admin',
//            'email'=>'admin@admin.com',
//            'password'=>bcrypt('12345678')
//        ]);

        User::factory()->count(500)->create();

    }
}
