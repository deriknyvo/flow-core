<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use App\Services\ConversationService;
use App\Models\Bot;

class ConversationController extends Controller
{
    public $service = null;

    public function __construct(ConversationService $service)
    {
        $this->service = $service;
    }

    public function start(ConversationRequest $request)
    {
        $customer = $this->service->createCustomer($request);
        $bot = Bot::findOfFail($request->idBot);
        $chat = $this->service->createChat($customer, $bot);

        $chat->processe();
    }
}
