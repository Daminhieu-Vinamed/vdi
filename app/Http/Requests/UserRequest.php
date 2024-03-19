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
            're_password' => 'required_with:password|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'username.required' => 'Không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'email.required' => 'Không được để trống',
            'email.email' => 'Không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Không được để trống',
            'password.min' => 'Độ dài trên 3 ký tự',
            're_password.required_with' => 'Không được để trống',
            're_password.same' => 'Xác nhận mật khẩu không đúng',
        ];
    }
}
