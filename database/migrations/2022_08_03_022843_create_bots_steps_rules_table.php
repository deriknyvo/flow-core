<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotsStepsRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots_steps_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bot_step')->constrained('bots_steps');
            $table->enum('rule', ['text', 'time', 'equal']);
            $table->string('value_to_compare')->nullable();
            $table->foreignId('redirect_to_step_id')->constrained('bots_steps');
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
        Schema::table('bots_steps_rules', function (Blueprint $table) {
            $table->dropForeign(['id_bot_step']);
            $table->dropForeign(['redirect_to_step_id']);
        });

        Schema::dropIfExists('bots_steps_rules');
    }
}
