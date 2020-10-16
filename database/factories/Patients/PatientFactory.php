<?php

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rndGender = $this->faker->randomElement(['male', 'female']);
        return [
            'externalID' => $this->faker->randomNumber(8),
            'first_name' => $this->faker->firstName($rndGender),
            'middle_name' => $this->faker->firstName($rndGender),
            'last_name' => $this->faker->lastName
        ];
    }
}
