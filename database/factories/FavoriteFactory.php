<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Terrain;

class FavoriteFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'terrain_id' => Terrain::factory(),
        ];
    }
}