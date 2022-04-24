<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProductUpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('products', 'title')->ignore($this->product)],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'numeric', 'integer'],
            'publisher' => ['nullable', 'string', 'max:255'],
            'place' => ['nullable', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'regex:/^[0-9]{13}$/'],
            'series' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'highlighted' => ['nullable', 'in:0,1'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:10000'],
        ];
    }
}
