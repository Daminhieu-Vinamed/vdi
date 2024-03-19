<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'current_password' =>  [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::where('id', Auth::user()->id)->first();
                    if (!Hash::check($value, $user->password)) {
                        $fail('Mật khẩu không đúng');
                    }
                },
            ],
            'password' => 'required|min:3',
            'new_re_password' => 'required_with:password|same:password'
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.min' => 'Độ dài trên 3 ký tự',
            'new_re_password.required_with' => 'Không được để trống',
            'new_re_password.same' => 'Xác nhận mật khẩu không đúng',
        ];
    }
}
