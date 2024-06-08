<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFileToS3(Request $request){
        dd(rRequest->file);
    }
}
