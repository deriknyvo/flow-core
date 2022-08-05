<?php

namespace Database\Factories;

use App\Models\BotStep;
use Illuminate\Database\Eloquent\Factories\Factory;

class BotStepMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomStep = BotStep::all()->random();

        return [
            'id_bot_step' => $randomStep->id,
            'message' => $this->faker->sentence(6 + $randomStep->id),
            'sort' => 0
        ];
    }
}
