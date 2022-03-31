<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tour_guide_id')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('type')->nullable();
            $table->integer('frequency')->nullable();
            $table->string('departure')->nullable();
            $table->string('destination')->nullable();
            $table->integer('is_feature')->nullable();
            $table->integer('people_limit')->nullable();
            $table->integer('days')->nullable();
            $table->integer('nights')->nullable();
            $table->double('adult_price')->nullable();
            $table->double('children_price')->nullable();
            $table->double('baby_price')->nullable();
            $table->string('transport')->nullable();
            $table->text('journey')->nullable();
            $table->text('description')->nullable();
            $table->text('schedule')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
