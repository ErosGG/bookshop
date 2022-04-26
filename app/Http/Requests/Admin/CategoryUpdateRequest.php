<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() ? auth()->user()->admin : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('categories', 'name')->ignore($this->category)],
            'highlighted' => ['required', 'in:0,1'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:10000'],
        ];
    }
}
