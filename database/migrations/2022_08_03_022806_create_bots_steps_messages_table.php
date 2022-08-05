<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotsStepsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots_steps_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bot_step')->constrained('bots_steps');
            $table->longText('message');
            $table->integer('sort');
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
        Schema::table('bots_steps_messages', function (Blueprint $table) {
            $table->dropForeign(['id_bot_step']);
        });

        Schema::dropIfExists('bots_steps_messages');
    }
}
