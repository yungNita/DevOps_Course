<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteStoreRequest;
use App\Http\Requests\FavoriteUpdateRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return Favorite::all();
    }

    public function store(FavoriteStoreRequest $request)
    {
        $favorite = Favorite::create($request->validated());
        return response()->json($favorite, 201);
    }

    public function show($id)
    {
        return Favorite::findOrFail($id);
    }

    public function update(FavoriteUpdateRequest $request, $id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->update($request->validated());
        return response()->json($favorite);
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
        return response()->json(null, 204);
    }
}