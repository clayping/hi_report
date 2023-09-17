<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lat' => 'required|string|max:50',
            'lng' => 'required|string|max:50',
            'category' => 'required|string|max:2000',
            'photo_1' => 'required|file|image|mimes:jpg,png',
            'photo_2' => 'required|file|image|mimes:jpg,png',

        ];
    }
}
