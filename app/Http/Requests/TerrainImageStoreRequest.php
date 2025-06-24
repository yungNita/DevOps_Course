<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrainImageStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'terrain_id' => 'required|exists:terrains,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}