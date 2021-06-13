<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitiateConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religion = [
            [
                'name_school' => 'SMK Teknologi Indonesia',
                'address_school' => 'Jl.Malabar no 17',
                'date_registration_selection_health_start' => '2021-06-13',
                'date_registration_selection_health_end' => '2021-06-13',
                'date_registration_selection_achievement_start' => '2021-06-13',
                'date_registration_selection_achievement_end' => '2021-06-13',
                'date_registration_selection_report_start' => '2021-06-13',
                'date_registration_selection_report_end' => '2021-06-13',
                'date_announcement_achievement_start' => '2021-06-13',
                'date_announcement_achievement_end' => '2021-06-13',
                'date_announcement_report_start' => '2021-06-13',
                'date_announcement_report_end' => '2021-06-13',
            ],
            
        ];

        DB::table('configs')->insert($religion);
    }
}
