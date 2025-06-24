<?php

namespace Database\Factories;

use App\Models\TerrainImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainImageFactory extends Factory
{
    protected $model = TerrainImage::class;

    public function definition()
    {
        return [
            'terrain_id' => \App\Models\Terrain::factory(),
            'image_path' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}