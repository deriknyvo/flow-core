<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_chat')->constrained('chats');
            $table->boolean('is_received');
            $table->enum('message_format', ['text', 'image', 'video', 'audio']);
            $table->longText('message_content');
            $table->text('wa_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages_history', function (Blueprint $table) {
            $table->dropForeign(['id_chat']);
        });

        Schema::dropIfExists('messages_history');
    }
}
