<?php

namespace Database\Factories\Insurances;

use App\Models\Demographics\Phone;
use App\Models\Insurances\Insurance;
use App\Models\Insurances\InsurancePhone;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsurancePhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InsurancePhone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_id' => Phone::select('id')->orderByRaw("RAND()")->first(),
            'insurance_id' => Insurance::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
