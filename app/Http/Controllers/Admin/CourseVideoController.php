<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;

class CourseVideoController extends Controller
{
    public function index()
    {
        $course_videos = Video::all();
        return view('admin.Course.Course_Videos.index',compact('course_videos'));
    }
}
