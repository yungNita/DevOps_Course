<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;

class PaymentFactory extends Factory
{
    public function definition()
    {
        return [
            'booking_id' => Booking::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'transaction_id' => $this->faker->unique()->uuid,
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'paid_at' => $this->faker->optional(0.7)->dateTimeThisYear, // 70% chance of being set
            'notes' => $this->faker->optional()->sentence,
        ];
    }
}