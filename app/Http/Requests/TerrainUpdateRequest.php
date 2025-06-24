<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTerrainRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'location' => 'sometimes|string|max:255',
            'area_size' => 'sometimes|numeric|min:0',
            'price_per_day' => 'sometimes|numeric|min:0',
            'available_from' => 'nullable|date',
            'available_to' => 'nullable|date|after_or_equal:available_from',
            'is_available' => 'sometimes|boolean',
            'main_image' => 'nullable|image|max:2048',
        ];
    }
}