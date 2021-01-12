<?php

namespace Database\Seeders;

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

        DB::table('tbl_service')->insert([
            ['service' => 'Outpatient'],
            ['service' => 'Inpatient']
        ]);

        DB::table('tbl_gender')->insert([
            ['sex' => 'Female'],
            ['sex' => 'Male']
        ]);
    }
}
