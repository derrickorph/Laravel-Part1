<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }
    public function uploadFile( Request $request)
    {
        if ($request->hasFile('file')) {
            $filename=$request->file->getClientOriginalName();
            $request->file->storeAS('images', $filename,'public');
            return back()->with('file_uploaded','File has been uploaded successfully!');
        }
    }
}
