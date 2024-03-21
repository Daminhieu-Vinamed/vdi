<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        return DataTables::of($users)->addColumn('action', function ($user) {
            return '<button type="button" class="btn btn-primary edit-user" data-toggle="modal" data-target="#editUserModal" id="' . $user['id'] . '">SỬA</button>';
        })->make(true);
    }

    public function create(CreateUserRequest $request)
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

    public function edit(Request $request)
    {
        $user = new User();
        $userEdit = $user->find($request->id);
        return response()->json(['user' => $userEdit->getAttributes()]);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = new User();
        $userUpdate = $user->find($request->id);
        $userUpdate->fill($request->all());
        $userUpdate->password = Hash::make($request->password);
        $userUpdate->save();
        return response()->json(['notification' => 'CẬP NHẬT KHOẢN THÀNH CÔNG !']);
    }
}