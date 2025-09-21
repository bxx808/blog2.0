<?php

namespace App\Http\Requests\Admin\CKEditor;

use Illuminate\Foundation\Http\FormRequest;

class CKEditorRequest extends FormRequest
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
            'upload' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
    }
}
