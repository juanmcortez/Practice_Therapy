<?php

namespace Database\Seeders;

use App\Models\Doctors\Doctor;
use App\Models\Insurances\Insurance;
use App\Models\Patients\InsurancePatient;
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
        $maxNumberOfIns = 3;
        $TotalNumOfInsr = 75;
        $TotalNumOfDocs = 250;
        $TotalNumOfPats = 12500;

        // Create insurances companies
        Insurance::factory()->count($TotalNumOfInsr)->create();

        // Create Doctors list
        Doctor::factory()->count($TotalNumOfDocs)->create();

        // Create Patients with the insurances relations
        Patient::factory()->count($TotalNumOfPats)->create();

        // Pivot Insurances / Patients
        foreach (Patient::all() as $patient) {
            $randIns = random_int(1, 3);
            $oldIns = array();
            for ($i = 1; $i <= $randIns; $i++) {
                $randCom = random_int(1, $TotalNumOfInsr);
                if (!in_array($randCom, $oldIns)) {
                    $oldIns[] = $randCom;
                    InsurancePatient::factory()
                        ->count(1)
                        ->create(
                            [
                                'patient_id' => $patient->id,
                                'insurance_id' => $randCom,
                            ]
                        );
                }
            }
        }
    }
}
