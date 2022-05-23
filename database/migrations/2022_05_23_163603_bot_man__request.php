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
        Schema::create('BotMan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guarantees');
            $table->string('hello');
            $table->string('bye');
            $table->string('payment');
            $table->string('cart');
            $table->string('mail');
            $table->string('office');
            $table->string('best');
            $table->string('delivery');
            $table->string('order');
            $table->string('call');
            $table->string('hit');
            $table->string('course');
            $table->string('you');
            $table->string('angry');
            $table->string('happy');
            $table->string('reg');
            $table->string('admin');
            $table->string('lang');
            $table->string('docs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
