<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2); // Increased precision for financial data
            $table->string('payment_method', 50); // Added length limit
            $table->string('transaction_id')->nullable()->unique(); // Added for payment processors
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->timestamp('paid_at')->nullable(); // When payment was completed
            $table->text('notes')->nullable(); // For any additional payment info
            $table->timestamps();
            
            $table->index('status'); // Better query performance for status checks
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}