<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'profile_photo_url' => $this->faker->filePath(),
            'phone_number' => $this->faker->unique()->e164PhoneNumber()
        ];
    }
}
