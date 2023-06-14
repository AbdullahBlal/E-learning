<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $course = \App\Models\Course::all();
        return view('',compact('course'));
    }
    public function insert(Request $request)
    {
        $course = new \App\Models\Course();
        $course->teacher_id = $request->input('teacher_id');
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->educational_level = $request->input('educational_level');
        $course->save();
    }
}
