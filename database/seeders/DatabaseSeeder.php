<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory()->count(3)->create();
        
        $this->call([
            TerrainSeeder::class,
            TerrainImageSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            ReviewSeeder::class,
            FavoriteSeeder::class,
        ]);
    }
}