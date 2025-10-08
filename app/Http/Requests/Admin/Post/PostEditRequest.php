<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'short_description' => 'string|min:3|max:255',
        ];
    }
}
