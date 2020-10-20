<?php

namespace Database\Factories\Demographics;

use App\Models\Demographics\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['home', 'work', 'office', 'emergency', 'cellphone', 'guardian']),
            'code' => '+1',
            'area' => $this->faker->randomNumber(3),
            'init' => $this->faker->randomNumber(3),
            'ends' => $this->faker->randomNumber(4)
        ];
    }
}
