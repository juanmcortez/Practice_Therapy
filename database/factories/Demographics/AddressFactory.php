<?php

namespace Database\Factories\Demographics;

use App\Models\Demographics\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'main' => $this->faker->streetAddress,
            'extended' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'country' => 'US',
        ];
    }
}
