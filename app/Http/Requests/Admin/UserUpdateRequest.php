<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! auth()->check()) return false;

        $routeUser = $this->user;

        $authUser = auth()->user();

        return $authUser->is($routeUser);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user()->id)],
            'email_confirmation' => ['required', 'same:email'],
            'actual_password' => ['required', 'string', 'min:4', 'max:20', 'current_password'],
            'new_password' => ['nullable', 'string', 'min:4', 'max:20', 'confirmed'],
            'new_password_confirmation' => ['nullable', 'same:new_password'],
        ];
    }
}
