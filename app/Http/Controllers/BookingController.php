<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function store(BookingStoreRequest $request)
    {
        $booking = Booking::create($request->validated());
        return response()->json($booking, 201);
    }

    public function show($id)
    {
        return Booking::findOrFail($id);
    }

    public function update(BookingUpdateRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->validated());
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(null, 204);
    }
}