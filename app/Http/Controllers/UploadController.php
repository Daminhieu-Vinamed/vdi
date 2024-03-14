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
            Storage::disk('d')->putFileAs(Auth::user()->username, $file, $file->getClientOriginalName());
        }
    }
}
