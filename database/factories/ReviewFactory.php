<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'terrain_id' => \App\Models\Terrain::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}