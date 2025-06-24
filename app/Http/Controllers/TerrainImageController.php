<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerrainImageStoreRequest;
use App\Http\Requests\TerrainImageUpdateRequest;
use App\Models\TerrainImage;
use Illuminate\Http\Request;

class TerrainImageController extends Controller
{
    public function index()
    {
        return TerrainImage::all();
    }

    public function store(TerrainImageStoreRequest $request)
    {
        $terrainImage = TerrainImage::create($request->validated());
        return response()->json($terrainImage, 201);
    }

    public function show($id)
    {
        return TerrainImage::findOrFail($id);
    }

    public function update(TerrainImageUpdateRequest $request, $id)
    {
        $terrainImage = TerrainImage::findOrFail($id);
        $terrainImage->update($request->validated());
        return response()->json($terrainImage);
    }

    public function destroy($id)
    {
        $terrainImage = TerrainImage::findOrFail($id);
        $terrainImage->delete();
        return response()->json(null, 204);
    }
}