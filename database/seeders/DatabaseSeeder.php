<?php

namespace Database\Seeders;

use App\Models\Bot;
use App\Models\BotStep;
use App\Models\BotStepMessage;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(10)->create();
        Bot::factory(1)->create();
        BotStep::factory(15)->create();
        BotStepMessage::factory(23)->create();
    }
}
