<?php

namespace Database\Factories\Patients;

use App\Models\Insurances\Insurance;
use App\Models\Patients\Patient;
use App\Models\Patients\InsurancePatient;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsurancePatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InsurancePatient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::select('id')->orderByRaw("RAND()")->first(),
            'insurance_id' => Insurance::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
