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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('room_id');
            $table->string('user_id');
            $table->string('checkin');
            $table->string('checkout');
            $table->string('guests');
            $table->string('days');
            $table->string('amount');
            $table->string('payment');
            $table->string('book_status');
            $table->string('cancel_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
