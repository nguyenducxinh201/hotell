<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bookroom_id')->unsigned();
            $table->foreign('bookroom_id')->references('id')->on('book_rooms')->onDelete('cascade');

            $table->integer('leaseroom_id')->unsigned();
            $table->foreign('leaseroom_id')->references('id')->on('lease_rooms')->onDelete('cascade');
            
            $table->decimal('room_price',10,2)->nullable();
            $table->decimal('service_price',10,2)->nullable();
            $table->decimal('count_price',10,2)->nullable();
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
        Schema::dropIfExists('bills');
    }
}
