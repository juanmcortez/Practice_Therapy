<?php

namespace Database\Factories\Patients;

use App\Models\Demographics\Address;
use App\Models\Patients\AddressPatient;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressPatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AddressPatient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::select('id')->orderByRaw("RAND()")->first(),
            'address_id' => Address::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
