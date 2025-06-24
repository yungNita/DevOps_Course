<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;

class TerrainController extends Controller
{
    public function index()
    {
        return Terrain::with(['owner', 'images'])->get();
    }

    public function store(StoreTerrainRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('terrain_images');
            $data['main_image'] = $path;
        }
        
        $terrain = Terrain::create($data);
        
        return response()->json($terrain, 201);
    }

    public function show(Terrain $terrain)
    {
        return $terrain->load(['owner', 'images', 'bookings', 'reviews', 'favorites']);
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $data = $request->validated();
        
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('terrain_images');
            $data['main_image'] = $path;
        }
        
        $terrain->update($data);
        
        return response()->json($terrain);
    }

    public function destroy(Terrain $terrain)
    {
        $terrain->delete();
        return response()->json(null, 204);
    }
}