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
        $religion = [
            ['name' => 'admin','email'=>'admin@gmail.com','password'=>Hash::make('admin'),'role'=>1],
            ['name' => 'testing account','email'=>'test@gmail.com','password'=>Hash::make('test'),'role'=>2],
        ];

        DB::table('users')->insert($religion);
    }
}
