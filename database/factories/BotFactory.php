<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'phone_number' => $this->faker->unique()->e164PhoneNumber()
        ];
    }
}
