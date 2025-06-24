<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Terrain;

class FavoriteSeeder extends Seeder
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

        // Create 50 favorites with existing users and terrains
        Favorite::factory()
            ->count(50)
            ->state(function () use ($users, $terrains) {
                return [
                    'user_id' => $users->random()->id,
                    'terrain_id' => $terrains->random()->id,
                ];
            })
            ->create();
    }
}