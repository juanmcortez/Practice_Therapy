<?php

namespace Database\Seeders;

use App\Models\Doctors\Doctor;
use App\Models\Insurances\Insurance;
use App\Models\Patients\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Users\User::factory(10)->create();
        Patient::factory(12500)->create();
        Doctor::factory(250)->create();
        Insurance::factory(75)->create();
    }
}
