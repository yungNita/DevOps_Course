<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrainImageUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update authorization logic as needed
    }

    public function rules()
    {
        return [
            'image' => 'nullable|image|max:2048', // Validate image file
            'terrain_id' => 'required|exists:terrains,id', // Validate terrain ID
        ];
    }
}