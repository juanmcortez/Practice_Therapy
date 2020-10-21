<?php

namespace Database\Factories\Doctors;

use App\Models\Demographics\Phone;
use App\Models\Doctors\Doctor;
use App\Models\Doctors\DoctorPhone;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorPhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoctorPhone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::select('id')->orderByRaw("RAND()")->first(),
            'phone_id' => Phone::select('id')->orderByRaw("RAND()")->first(),
        ];
    }
}
