<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ChatService;

class StartTestFlow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iniciar um fluxo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ChatService $chatService)
    {
        $request = (object) [
            'idBot' => 1,
            'message' => 'Olá, tudo bem?',
            'senderPhoneNumber' => '5544991197146',
            'name' => 'Derik Nyvo',
            'profilePhotoUrl' => null
        ];

        $messages = $chatService->start($request);

        $messages->each(function ($message) {
            $this->info($message->message);
        });

        // $this->info(json_encode($result));
        // var_dump($result);
    }
}
