<?php

namespace Database\Seeders;

use App\Models\Demographics\Address;
use App\Models\Demographics\Phone;
use App\Models\Doctors\AddressDoctor;
use App\Models\Doctors\Doctor;
use App\Models\Doctors\DoctorPhone;
use App\Models\Insurances\AddressInsurance;
use App\Models\Insurances\Insurance;
use App\Models\Insurances\InsurancePhone;
use App\Models\Patients\AddressPatient;
use App\Models\Patients\InsurancePatient;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientPhone;
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

        $this->command->info('Creating insurances phones');
        Phone::factory()->count($TotalNumOfInsr)->create(['type' => 'office']);


        // Create Doctors list
        $this->command->info('Creating doctors');
        Doctor::factory()->count($TotalNumOfDocs)->create();

        $this->command->info('Creating doctors addresses');
        Address::factory()->count($TotalNumOfDocs)->create();

        $this->command->info('Creating doctors phones');
        Phone::factory()->count($TotalNumOfDocs)->create(['type' => 'office']);
        Phone::factory()->count($TotalNumOfDocs)->create(['type' => 'fax']);


        // Create Patients with the insurances relations
        $this->command->info('Creating patients');
        Patient::factory()->count($TotalNumOfPats)->create();

        $this->command->info('Creating patient addresses');
        Address::factory()->count($TotalNumOfPats)->create();

        $this->command->info('Creating patient phones');
        Phone::factory()->count($TotalNumOfPats)->create();


        // Pivot Insurances / Patients / Addresses / Phones
        $this->command->info('Linking');

        foreach (Doctor::all() as $doctor) {
            // Add Doctor Address
            AddressDoctor::factory()
                ->count(1)
                ->create(
                    [
                        'doctor_id' => $doctor->id,
                        'address_id' => ($doctor->id + $TotalNumOfInsr),
                    ]
                );

            // Add Doctor Phones
            DoctorPhone::factory()
                ->count(1)
                ->create(
                    [
                        'doctor_id' => $doctor->id,
                        'phone_id' => ($doctor->id + $TotalNumOfInsr),
                    ]
                );
            DoctorPhone::factory()
                ->count(1)
                ->create(
                    [
                        'doctor_id' => $doctor->id,
                        'phone_id' => ($doctor->id + $TotalNumOfInsr + $TotalNumOfInsr),
                    ]
                );
        }

        foreach (Patient::all() as $patient) {
            // Add Patient Address
            AddressPatient::factory()
                ->count(1)
                ->create(
                    [
                        'patient_id' => $patient->id,
                        'address_id' => ($patient->id + $TotalNumOfInsr + $TotalNumOfDocs),
                    ]
                );

            // Add Patient Phone
            PatientPhone::factory()
                ->count(1)
                ->create(
                    [
                        'patient_id' => $patient->id,
                        'phone_id' => ($patient->id + $TotalNumOfInsr + $TotalNumOfDocs + $TotalNumOfDocs),
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
                    InsurancePatient::factory()
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
                                    'insurance_id' => $randCom,
                                ]
                            );

                        // Add Insurance Phone
                        InsurancePhone::factory()
                            ->count(1)
                            ->create(
                                [
                                    'insurance_id' => $randCom,
                                ]
                            );
                    }
                }
            }
        }
    }
}
