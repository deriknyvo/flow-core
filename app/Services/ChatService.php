<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Chat;
use App\Models\Bot;

class ChatService
{
    public function start($request)
    {
        $customer = $this->createCustomer($request);
        $bot = Bot::findOrFail($request->idBot);
        $chat = $this->createChat($customer, $bot);

        $messagesToSend = $chat->processe($request->message);

        return $messagesToSend;
    }

    private function createCustomer($request)
    {
        $customer = Customer::where('phone_number', $request->senderPhoneNumber)->first();

        if (is_object($customer)) {
            return $customer;
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->profile_photo_url = $request->profilePhotoUrl;
        $customer->phone_number = $request->senderPhoneNumber;
        $customer->save();

        return $customer;
    }

    private function createChat($customer, $bot)
    {
        $chat = Chat::where('id_customer', $customer->id)->first();

        if (is_object($chat)) {
            return $chat;
        }

        $chat = new Chat();
        $chat->id_bot = $bot->id;
        $chat->id_customer = $customer->id;
        $chat->current_step_id = $bot->first_step_id;
        $chat->save();

        return $chat;
    }
}