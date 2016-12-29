<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season')->default(1);
            $table->decimal('first_hours',10,2);
            $table->decimal('second_hours',10,2);
            $table->decimal('third_hours',10,2);
            $table->decimal('day_price',10,2);
            $table->integer('roomtype_id')->unsigned();
            $table->foreign('roomtype_id')->references('id')->on('room_types');
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
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
        Schema::dropIfExists('room_prices');
    }
}