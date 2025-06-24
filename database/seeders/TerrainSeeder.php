<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terrain;

class TerrainSeeder extends Seeder
{
    public function run()
    {

        Terrain::create([
            'title' => 'Mountain Range',
            'description' => 'A beautiful mountain range with stunning views.',
            'location' => 'Colorado',
            'area_size' => 1000.00,
            'price_per_day' => 150.00,
            'available_from' => now(),
            'available_to' => now()->addMonth(),
            'is_available' => true,
            'main_image' => null,
            
        ]);

        Terrain::create([
            'title' => 'Beach Paradise',
            'description' => 'A serene beach with golden sands and clear waters.',
            'location' => 'Maldives',
            'area_size' => 500.00,
            'price_per_day' => 200.00,
            'available_from' => now(),
            'available_to' => now()->addMonths(2),
            'is_available' => true,
            'main_image' => null,
            
        ]);

        Terrain::create([
            'title' => 'Desert Oasis',
            'description' => 'An oasis in the middle of a vast desert.',
            'location' => 'Sahara',
            'area_size' => 1500.00,
            'price_per_day' => 100.00,
            'available_from' => now(),
            'available_to' => now()->addMonths(3),
            'is_available' => true,
            'main_image' => null,
            
        ]);

        Terrain::create([
            'title' => 'Forest Retreat',
            'description' => 'A peaceful retreat surrounded by lush forests.',
            'location' => 'Amazon',
            'area_size' => 2000.00,
            'price_per_day' => 120.00,
            'available_from' => now(),
            'available_to' => now()->addMonths(4),
            'is_available' => true,
            'main_image' => null,
            
        ]);

        Terrain::create([
            'title' => 'City Skyline',
            'description' => 'A vibrant city with a stunning skyline.',
            'location' => 'New York',
            'area_size' => 300.00,
            'price_per_day' => 180.00,
            'available_from' => now(),
            'available_to' => now()->addMonths(5),
            'is_available' => true,
            'main_image' => null,
            
        ]);
    }
}