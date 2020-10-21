<?php

namespace Database\Factories\Insurances;

use App\Models\Insurances\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Insurance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attention' => $this->faker->tld,
            'group' => $this->faker->word,
            'name' => $this->faker->company,
            'default_effective' => $this->faker->dateTimeBetween('-5 years', '-1 years'),
            'default_termination' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'participating' => $this->faker->boolean,
            'do_not_bill' => $this->faker->boolean,
            'do_not_import' => $this->faker->boolean,
            'cms_id' => $this->faker->randomNumber(6),
            /*'payer_type' => $this->faker->company,
            'x12_partner' => $this->faker->company,
            'financial_class' => $this->faker->company,
            'payment_code' => $this->faker->company,*/
        ];
    }
}
