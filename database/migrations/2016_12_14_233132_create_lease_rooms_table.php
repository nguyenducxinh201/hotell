<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaseRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lease_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('checkin');
            $table->datetime('checkout')->nullable();
            $table->integer('bookroom_id')->unsigned();
            $table->foreign('bookroom_id')->references('id')->on('book_rooms')->onDelete('cascade');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('lease_active')->default(1);
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
        Schema::dropIfExists('lease_rooms');
    }
}
