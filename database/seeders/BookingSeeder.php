<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Terrain;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Get existing users and terrains
        $users = User::all();
        $terrains = Terrain::all();

        if ($users->isEmpty() || $terrains->isEmpty()) {
            $this->command->error('Please seed users and terrains first!');
            return;
        }

        $statuses = ['pending', 'confirmed', 'canceled'];

        for ($i = 0; $i < 10; $i++) {
            $startDate = Carbon::now()->addDays(rand(1, 30));
            $endDate = (clone $startDate)->addDays(rand(1, 14));
            $days = $endDate->diffInDays($startDate);

            Booking::create([
                'user_id' => $users->random()->id,
                'terrain_id' => $terrains->random()->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_price' => $terrains->random()->price_per_day * $days,
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}