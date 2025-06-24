<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerrainImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('terrain_images')->insert([
            [
                'terrain_id' => 1,
                'image_path' => 'images/terrain1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'terrain_id' => 1,
                'image_path' => 'images/terrain1_alt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'terrain_id' => 2,
                'image_path' => 'images/terrain2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'terrain_id' => 3,
                'image_path' => 'images/terrain3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}