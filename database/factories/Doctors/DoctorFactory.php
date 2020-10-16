<?php

namespace Database\Factories\Doctors;

use App\Models\Doctors\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rndGender = $this->faker->randomElement(['male', 'female']);
        return [
            'first_name' => $this->faker->firstName($rndGender),
            'middle_name' => $this->faker->firstName($rndGender),
            'last_name' => $this->faker->lastName,
            'specialty' => $this->faker->jobTitle
        ];
    }
}
