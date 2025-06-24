<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this to implement authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'terrain_id' => 'required|exists:terrains,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ];
    }
}