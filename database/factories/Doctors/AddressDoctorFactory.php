<?php

namespace Database\Factories\Doctors;

use App\Models\Demographics\Address;
use App\Models\Doctors\AddressDoctor;
use App\Models\Doctors\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressDoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AddressDoctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::select('id')->orderByRaw("RAND()")->first(),
            'address_id' => Address::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
