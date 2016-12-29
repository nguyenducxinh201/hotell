<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancleRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancle_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bookroom_id')->unsigned();
            $table->foreign('bookroom_id')->references('id')->on('book_rooms')->onDelete('cascade');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->datetime('cancle_date');
            $table->integer('cancle_status');
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
        Schema::dropIfExists('cancle_rooms');
    }
}
