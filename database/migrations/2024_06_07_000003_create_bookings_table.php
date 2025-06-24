<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('terrain_id')->constrained('terrains')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Changed from renter_id to user_id
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->enum('status', ['pending', 'confirmed', 'canceled', 'completed'])->default('pending'); // Matched status values with seeder
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}