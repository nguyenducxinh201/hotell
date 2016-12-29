<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookRoomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_room_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('bookroom_id')->unsigned();
            $table->foreign('bookroom_id')->references('id')->on('book_rooms')->onDelete('cascade');
            $table->datetime('receive_date');
            $table->datetime('leave_date');
            $table->string('note')->nullable();
            $table->integer('active')->default(0);
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
        Schema::dropIfExists('book_room_details');
    }
}
