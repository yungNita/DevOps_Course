<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update this logic based on your authorization needs
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'terrain_id' => 'required|exists:terrains,id',
        ];
    }
}