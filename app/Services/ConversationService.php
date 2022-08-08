<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Customer;

class ConversationService
{
    public function createCustomer($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->profile_photo_url = $request->profilePhotoUrl;
        $customer->phone_number = $request->senderPhoneNumber;
        $customer->save();

        return $customer;
    }

    public function createChat($customer, $bot)
    {
        $chat = new Chat();
        $chat->id_bot = $bot->id;
        $chat->id_customer = $customer->id;
        $chat->current_step_id = $bot->first_step_id;

        return $chat;
    }
}