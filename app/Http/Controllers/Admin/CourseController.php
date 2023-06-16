<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\isEmpty;

class CourseController extends Controller
{

    public function index()
    {
        $courses = \App\Models\Course::all();
        return view('admin.Course.index',compact('courses'));
        #return view('',compact('course'));
    }
    public function add()
    {
        return view('admin.Course.insert');
    }
    public function insert(Request $request)
    {
        $course = new \App\Models\Course();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/courses',$filename);
            $course->image = $filename;
        }
        $course->teacher_id = $request->input('teacher_id');
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->meta_title = $request->input('meta_title');
        $course->educational_level = $request->input('educational_level');
        $course->slug = $request->input('slug');
        $course->meta_description = $request->input('meta_description');
        $course->meta_keywords = $request->input('meta_keywords');
        if ($request->filled('duration')) {
        }
        else{
            $course->duration = 0;
        }
        $course->status = $request->input('status') == TRUE ?'1':'0';
        $course->popular = $request->input('popular') == TRUE ?'1':'0';;
        $course->save();
        return redirect('/dashboard')->with('status','Course added successfully');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.Course.edit',compact('course'));
    }
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/courses/' .$course->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/courses',$filename);
            $course->image = $filename;
        }
        $course->teacher_id = $request->input('teacher_id');
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->meta_title = $request->input('meta_title');
        $course->educational_level = $request->input('educational_level');
        $course->slug = $request->input('slug');
        $course->meta_description = $request->input('meta_description');
        $course->meta_keywords = $request->input('meta_keywords');
        if ($request->filled('duration')) {
        }
        else{
            $course->duration = 0;
        }
        $course->status = $request->input('status') == TRUE ?'1':'0';
        $course->popular = $request->input('popular') == TRUE ?'1':'0';;
        $course->update();
        return redirect('/dashboard')->with('status','Course updated successfully');
    }
    public function delete($id)
    {
        $course = Course::find($id);
        if ($course->image) {
            $path = 'assets/uploads/courses/' . $course->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $course->delete();
        return redirect('/dashboard')->with('status','Course deleted successfully');
    }
}
