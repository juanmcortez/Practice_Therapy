<?php

namespace Database\Factories\Patients;

use App\Models\Demographics\Phone;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientPhone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientPhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientPhone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_id' => Phone::select('id')->orderByRaw("RAND()")->first(),
            'patient_id' => Patient::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
