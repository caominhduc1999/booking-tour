<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->after('tour_id');
            $table->string('booking_person_phone')->nullable()->after('user_id');
            $table->string('booking_person_name')->nullable()->after('booking_person_phone');
            $table->string('booking_person_email')->nullable()->after('booking_person_name');
            $table->string('booking_person_address')->nullable()->after('booking_person_email');
            $table->integer('payment')->nullable()->after('status');
            $table->integer('payment_status')->nullable()->after('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('booking_person_phone');
            $table->dropColumn('booking_person_name');
            $table->dropColumn('booking_person_email');
            $table->dropColumn('booking_person_address');
            $table->dropColumn('payment');
            $table->dropColumn('payment_status');
        });
    }
}
