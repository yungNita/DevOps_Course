<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update this logic based on your authorization needs
    }

    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:0',
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|in:pending,completed,failed',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.',
            'booking_id.required' => 'The booking ID field is required.',
            'booking_id.exists' => 'The selected booking ID is invalid.',
            'payment_method.required' => 'The payment method field is required.',
            'payment_method.string' => 'The payment method must be a string.',
            'payment_method.max' => 'The payment method may not be greater than 255 characters.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The selected status is invalid.',
        ];
    }
}