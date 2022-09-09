<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class driverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'driver_name' => $this->faker->name,
            'driver_id_no' => Str::random(10),
            'driver_phonenumber' =>$this->faker->unique()->numberBetween(100000000,200000000),
            'driver_email'=> $this->faker->unique()->safeEmail,
            'driver_license_no' => Str::random(10),
            'driver_res_place' => 'Harare',
        ];
    }
}
