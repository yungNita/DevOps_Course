<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function store(ReviewStoreRequest $request)
    {
        $review = Review::create($request->validated());
        return response()->json($review, 201);
    }

    public function show($id)
    {
        return Review::findOrFail($id);
    }

    public function update(ReviewUpdateRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->validated());
        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(null, 204);
    }
}