<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
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
        $files = new File();
        foreach ($request->file('files') as $file) {
            Storage::disk('f')->putFileAs(Auth::user()->username, $file, $file->getClientOriginalName());
            $files->name = $file->getClientOriginalName();
            $files->user_id = Auth::user()->id;
            $files->save();
        }
        return redirect()->route('notification')->with('success', 'UPLOAD FILES SUCCESSFULLY !');
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
