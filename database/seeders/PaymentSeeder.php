<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Booking;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $bookings = Booking::all();

        if ($bookings->isEmpty()) {
            $this->command->error('Please seed bookings first!');
            return;
        }

        foreach ($bookings as $booking) {
            Payment::create([
                'booking_id' => $booking->id,
                'amount' => $booking->total_price,
                'payment_method' => ['credit_card', 'paypal', 'bank_transfer'][rand(0, 2)],
                'status' => $booking->status === 'confirmed' ? 'completed' : 'pending',
                'paid_at' => $booking->status === 'confirmed' ? now() : null,
            ]);
        }
    }
}