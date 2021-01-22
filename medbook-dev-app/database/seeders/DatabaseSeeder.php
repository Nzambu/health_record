<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Email::factory(1)->create();
        \App\Models\Phone::factory(1)->create();
        \App\Models\Password::factory(1)->create();

        DB::table('tbl_service')->insert([
            ['service' => 'Outpatient'],
            ['service' => 'Inpatient']
        ]);

        DB::table('tbl_gender')->insert([
            ['sex' => 'Female'],
            ['sex' => 'Male']
        ]);

        // DB::table('tbl_patient')->insert([
        //     [
        //         'name' => 'Kevin Brown',
        //         'dob' => Carbon::createFromDate('1993', '01', '15'),
        //         'gender_id' => 2,
        //         'service_id' => 1,
        //         'comments' => 'First Time'
        //     ],
        //     [
        //         'name' => 'Leah Gitonga',
        //         'dob' => Carbon::createFromDate('1989', '07', '26'),
        //         'gender_id' => 1,
        //         'service_id' => 2,
        //         'comments' => 'Not Feeling Well'
        //     ],
        // ]);

        \App\Models\Patient::factory(50)->create();
    }
}
