<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_men', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class',1000);
            $table->integer('array');
            $table->string('answer_bot');

            $table->string('button_confirm')->nullable();;
            $table->string('text_confirm',100)->nullable();;
            $table->string('button_decline')->nullable();;
            $table->string('text_decline',100)->nullable();;
            $table->string('button_video')->nullable();;
            $table->string('text_video',100)->nullable();;
            $table->string('video')->nullable();;

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
