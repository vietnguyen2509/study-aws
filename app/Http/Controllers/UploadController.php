<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UploadController extends Controller
{
    public function index()
    {
    	$files = [];
    	$filePaths = Storage::disk('s3')->allFiles('');

    	foreach ($filePaths as $key => $filePath) {
    		$files[] = [
    			'name' => $filePath,
    			'url' => Storage::disk('s3')->temporaryUrl($filePath, Carbon::now()->addMinutes(5))
    		];
    	}

    	return view('upload', compact('files'));
    }

    public function store(Request $request)
    {
    	$file = $request->file('file');
    	
    	Storage::disk('s3')->put($file->getClientOriginalName(), $request->file);

    	$files = [];
    	$filePaths = Storage::disk('s3')->allFiles('');

    	foreach ($filePaths as $key => $filePath) {
    		$files[] = [
    			'name' => $filePath,
    			'url' => Storage::disk('s3')->temporaryUrl($filePath, Carbon::now()->addMinutes(5))
    		];
    	}

    	return view('upload', compact('files'));
    }
}
