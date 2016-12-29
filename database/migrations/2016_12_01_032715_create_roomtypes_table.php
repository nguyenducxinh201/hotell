<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roomtype_name',255);
            $table->integer('roomtype_quantity')->length(3);
            $table->integer('guest_count')->length(1);
            $table->integer('bed_count')->length(1);
            $table->string('roomtype_picture',255);
            $table->integer('area')->length(3);
            $table->string('direct',255);
            $table->string('bed_type',255);
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            // $table->string('tiennghiphong');
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
        Schema::dropIfExists('room_types');
    }
}
