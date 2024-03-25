<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FileController extends Controller
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
                $fileCheck = $files->where('name', '=', $file->getClientOriginalName())->where('user_id', '=', Auth::user()->id)->first();
                Storage::disk('f')->putFileAs(Auth::user()->username, $file, $file->getClientOriginalName());
                $time = Carbon::now()->format('Y-m-d H:i:s');
                if (isset($fileCheck)) {
                    $fileCheck->updated_at = $time;
                    $fileCheck->save();
                } else {
                    $files->name = $file->getClientOriginalName();
                    $files->user_id = Auth::user()->id;
                    $files->created_at = $time;
                    $files->updated_at = $time;
                    $files->save();
                }
            }
            DB::commit();
            return response()->json(['notification' => 'TẢI TÀI LIỆU THÀNH CÔNG !']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response();
        }
    }

    public function notification()
    {
        $success = session()->get('success');
        if (!empty($success)) {
            session()->forget('success');
            return view('notification', compact("success"));
        } else {
            return redirect()->route('file.getUpload');
        }
    }

    public function historyFile()
    {
        return view('history-file');
    }

    public function anyData()
    {
        $files = File::select('id', 'name', 'created_at', 'updated_at')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return DataTables::of($files)->removeColumn('id')
            ->editColumn('created_at', function ($file) {
                return $file->created_at->format('d-m-Y');
            })->addColumn('created_time', function ($file) {
                return $file->created_at->format('H:i:s');
            })->editColumn('updated_at', function ($file) {
                return $file->updated_at->format('d-m-Y');
            })->addColumn('updated_time', function ($file) {
                return $file->updated_at->format('H:i:s');
            })->make(true);
    }
}