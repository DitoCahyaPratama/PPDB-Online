<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religion = [
            ['name' => 'Teknik Komputer dan Jaringan'],
            ['name' => 'Rekayasa Perangkat Lunak'],
            ['name' => 'Teknik Mekatronika'],
            ['name' => 'Teknik ELektronika Industri'],
        ];

        DB::table('departments')->insert($religion);
    }
}
