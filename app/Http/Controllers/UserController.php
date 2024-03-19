<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function list()
    {
        return view('user');
    }
    public function anyData()
    {
        $users = User::select('id', 'name', 'username', 'email')->where('role', '!=', config('constants.number.two'))->orderBy('id', 'desc')->get();
        return DataTables::of($users)->make(true);
    }

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
