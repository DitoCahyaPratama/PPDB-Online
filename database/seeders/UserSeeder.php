<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name' => 'admin','email'=>'admin@gmail.com','password'=>Hash::make('admin'),'role'=>1],
            ['name' => 'testing account','email'=>'test@gmail.com','password'=>Hash::make('test'),'role'=>2],
            ['name' => 'testing account2','email'=>'test2@gmail.com','password'=>Hash::make('test2'),'role'=>2],
        ];

        DB::table('users')->insert($user);
    }
}

