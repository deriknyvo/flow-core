<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Services\ChatService;

class ChatController extends Controller
{
    public $chatService = null;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function start(ChatRequest $request)
    {
        $response = $this->chatService->start($request);

        return response()->json($response);
    }
}
