<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function getUpload()
    {
        return view('upload');
    }

    public function postUpload(Request $request)
    {
        foreach ($request->file('files') as $file) {
            Storage::disk('f')->putFileAs(Auth::user()->username, $file, $file->getClientOriginalName());
        }
        return redirect()->route('notification')->with('success', 'TẢI TÀI LIỆU LÊN THÀNH CÔNG !');
    }

    public function notification()
    {
        $success = session()->get('success');
        if (!empty($success)) {
            session()->forget('success');
            return view('notification', compact("success"));
        } else {
            return redirect()->route('upload.getUpload');
        }
    }
}
