<?php

namespace Database\Factories\Insurances;

use App\Models\Demographics\Address;
use App\Models\Insurances\AddressInsurance;
use App\Models\Insurances\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressInsuranceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AddressInsurance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'insurance_id' => Insurance::select('id')->orderByRaw("RAND()")->first(),
            'address_id' => Address::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
