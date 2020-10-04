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
            $table->string('booking_code')->unique();
            $table->string('name')->index();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable()->index();
            $table->string('personal_identity')->nullable();
            $table->string('organization_name')->nullable();
            $table->unsignedDouble('peoples_count')->nullable();
            $table->foreignId('schedule_id')->nullable()->constrained();
            $table->string('status')->nullable()->index();
            $table->softDeletes();
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
