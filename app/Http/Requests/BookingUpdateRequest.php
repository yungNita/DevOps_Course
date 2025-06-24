<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update authorization logic as needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'terrain_id' => 'required|exists:terrains,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|string',
        ];
    }
}