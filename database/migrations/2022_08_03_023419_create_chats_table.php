<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bot')->constrained('bots');
            $table->foreignId('id_customer')->constrained('customers');
            $table->foreignId('current_step_id')->constrained('bots_steps');
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
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['id_bot']);
            $table->dropForeign(['id_customer']);
            $table->dropForeign(['current_step_id']);
        });

        Schema::dropIfExists('chats');
    }
}
