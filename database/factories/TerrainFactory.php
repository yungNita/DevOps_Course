<?php

namespace Database\Factories;

use App\Models\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainFactory extends Factory
{
    protected $model = Terrain::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'location' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}