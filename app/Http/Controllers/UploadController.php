<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function getUpload()
    {
        return view('upload');
    }

    public function postUpload(Request $request)
    {
        DB::beginTransaction();
        try {
            $files = new File();
            foreach ($request->file('files') as $file) {
                $checkExists = $files->where('name', '=', $file->getClientOriginalName())->exists();
                Storage::disk('f')->putFileAs(Auth::user()->username, $file, $file->getClientOriginalName());
                if (!$checkExists) {
                    $files->name = $file->getClientOriginalName();
                    $files->user_id = Auth::user()->id;
                    $files->save();
                }
            }
            DB::commit();
            return response()->json(['notification' => 'TẢI TÀI LIỆU LÊN THÀNH CÔNG !']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['notification' => 'HÃY TẢI FILE CÓ DUNG LƯỢNG TỐI ĐA 40MB !']);
        }
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
