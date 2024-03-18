<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('create-user');
    }
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->role = config('constants.number.one');
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route('notification')->with('success', 'CREATE USER SUCCESSFULLY !');
    }
}
