<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class MediaController extends Controller
{
    //
    public function uploadImage($courseId)
    {
        $course = Course::where('id', $course)->first();
        return view('admin.course.upload-video', compact('course'));
    }
}
