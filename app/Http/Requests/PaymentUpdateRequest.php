<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update authorization logic as needed
    }

    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,completed,failed',
            'booking_id' => 'required|exists:bookings,id',
            // Add other validation rules as necessary
        ];
    }
}