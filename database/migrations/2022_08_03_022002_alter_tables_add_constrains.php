<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesAddConstrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bots', function (Blueprint $table) {
            $table->foreign('first_step_id')->references('id')->on('bots_steps');
        });

        Schema::table('bot_steps', function (Blueprint $table) {
            $table->foreign('id_bot')->references('id')->on('bots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bots', function (Blueprint $table) {
            $table->dropForeign(['first_step_id']);
        });

        Schema::table('bot_steps', function (Blueprint $table) {
            $table->dropForeign(['id_bot']);
        });
    }
}
