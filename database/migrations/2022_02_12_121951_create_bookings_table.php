<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tour_id')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->date('booking_date')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('adult_number')->nullable();
            $table->integer('children_number')->nullable();
            $table->integer('baby_number')->nullable();
            $table->unsignedInteger('discount_id')->nullable();
            $table->double('total_price')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
