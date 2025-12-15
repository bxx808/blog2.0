<?php

namespace App\Http\Requests\SettingUser;

use Illuminate\Foundation\Http\FormRequest;

class SettingUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'backProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string',
            'firstName' => 'required|string|max:255',
            'about' => 'required|string|max:120',
        ];
    }
}
