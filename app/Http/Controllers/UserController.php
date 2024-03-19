<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->role = config('constants.number.one');
        $user->email_verified_at = now();
        $user->save();
        return response()->json(['notification' => 'TẠO TÀI KHOẢN THÀNH CÔNG !']);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = new User();
        $userChangePassword = $user->where('id', Auth::user()->id)->first();
        $userChangePassword->fill($request->all());
        $userChangePassword->save();
        return response()->json(['notification' => 'ĐỔI MẬT KHẨU THÀNH CÔNG !']);
    }
}
