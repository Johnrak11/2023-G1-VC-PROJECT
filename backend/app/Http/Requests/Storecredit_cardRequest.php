<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storecredit_cardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'profile_picture' => 'nullable|url',
            'google_id' => 'required|string|max:255',
        ];
    }
}
