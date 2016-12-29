<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
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
            $table->string('room_name',200);
            $table->integer('room_active')->default(0);
            $table->string('room_note')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
