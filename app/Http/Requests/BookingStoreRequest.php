<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'terrain_id' => 'required|exists:terrains,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'number_of_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:255',
        ];
    }
}