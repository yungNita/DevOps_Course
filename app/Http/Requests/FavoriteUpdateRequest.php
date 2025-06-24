<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update authorization logic as needed
    }

    public function rules()
    {
        return [
            'terrain_id' => 'required|exists:terrains,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}