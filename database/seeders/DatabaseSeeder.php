<?php

namespace Database\Seeders;

use App\Models\Demographics\Address;
use App\Models\Doctors\Doctor;
use App\Models\Insurances\AddressInsurance;
use App\Models\Insurances\Insurance;
use App\Models\Patients\AddressPatient;
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
        $TotalNumOfPats = 100;

        // Create insurances companies
        $this->command->info('Creating insurances');
        Insurance::factory()->count($TotalNumOfInsr)->create();

        $this->command->info('Creating insurances addresses');
        Address::factory()->count($TotalNumOfInsr)->create();


        // Create Doctors list
        $this->command->info('Creating doctors');
        Doctor::factory()->count($TotalNumOfDocs)->create();


        // Create Patients with the insurances relations
        $this->command->info('Creating patients');
        Patient::factory()->count($TotalNumOfPats)->create();

        $this->command->info('Creating patient addresses');
        Address::factory()->count($TotalNumOfPats)->create();


        // Pivot Insurances / Patients / Addresses
        $this->command->info('Linking');
        foreach (Patient::all() as $patient) {
            // Add Pateint Address
            AddressPatient::factory()
                ->count(1)
                ->create(
                    [
                        'patient_id' => $patient->id,
                        'address_id' => ($patient->id + 75),
                    ]
                );

            // Add insurances
            $randIns = random_int(1, 3);
            $oldIns = array();
            for ($i = 1; $i <= $randIns; $i++) {
                $randCom = random_int(1, $TotalNumOfInsr);
                if (!in_array($randCom, $oldIns)) {
                    $oldIns[] = $randCom;
                    // Add insurance to patient
                    $insurance = InsurancePatient::factory()
                        ->count(1)
                        ->create(
                            [
                                'patient_id' => $patient->id,
                                'insurance_id' => $randCom,
                            ]
                        );

                    // Add address to insurance
                    if (!AddressInsurance::where('insurance_id', $randCom)->first()) {
                        AddressInsurance::factory()
                            ->count(1)
                            ->create(
                                [
                                    'insurance_id' => $randCom
                                ]
                            );
                    }
                }
            }
        }
    }
}
