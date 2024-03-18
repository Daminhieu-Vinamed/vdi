<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'password_confirmation' => 'required_with:password|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Required name',
            'username.required' => 'Required username',
            'username.unique' => 'Username already exists',
            'email.required' => 'Required email',
            'email.email' => 'Email invalidate',
            'email.unique' => 'Email already exists',
            'password.required' => 'Required password',
            'password.min' => 'Password must be at least 3 characters',
            'password_confirmation.required_with' => 'Required password confirmation',
            'password_confirmation.same' => 'Re-password not same password',
        ];
    }
}
