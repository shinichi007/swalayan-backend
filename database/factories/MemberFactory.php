<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotZero(),
            'status' => 'pending',
            'code' => $this->faker->randomNumber(),
            'point' => $this->faker->randomNumber(1,100),
            'nik' => $this->faker->randomNumber(),
            'ktp_name' => $this->faker->titleMale(),
            'ktp_img' => $this->faker->imageUrl(),
            'ktp_gender' => 'f',
            'ktp_dob' => $this->faker->city().','.$this->faker->date(),
            'ktp_address' => $this->faker->address(),
        ];
    }
}
