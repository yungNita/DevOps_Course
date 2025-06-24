<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update authorization logic as needed
    }

    public function rules()
    {
        return [
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
            'terrain_id' => 'required|exists:terrains,id',
        ];
    }
}