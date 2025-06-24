<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 1,
                'terrain_id' => 1,
                'rating' => 5,
                'comment' => 'Amazing experience!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'terrain_id' => 1,
                'rating' => 4,
                'comment' => 'Very nice place, will visit again.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'terrain_id' => 2,
                'rating' => 3,
                'comment' => 'It was okay, could be better.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'terrain_id' => 2,
                'rating' => 2,
                'comment' => 'Not what I expected.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'terrain_id' => 3,
                'rating' => 5,
                'comment' => 'Absolutely loved it!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}