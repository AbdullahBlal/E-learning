<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TeacherController extends Controller
{
    // teacher role is 2 on the user_role table and 0 is the default role created with the new users
    public function index()
    {
        $teachers = Teacher::join('users', 'teachers.user_id', '=', 'users.id')->select('users.*','teachers.*')->get();
        return view('admin.Teacher.index',compact('teachers'));
    }
    public function assignRole()
    {
        $teachers = User::where('user_role_id','=','0')->get();
        return view('admin.Teacher.insert',compact('teachers'));
    }
    public function insert(Request $request)
    {
        $teacher = new Teacher();
        $teacher->user_id =$request->input('user_id');
        $teacher->save();
        $user = User::find($request->input('user_id'));
        $user->user_role_id =2;
        $user->save();
        return redirect('/dashboard')->with('status','Teacher added successfully');
    }

    public function edit($userid)
    {
        $user = User::find($userid);
        return view('admin.Teacher.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect('/dashboard')->with('status','Teacher updated successfully');

    }
    public function delete($userid)
    {
        $teacher = Teacher::where('user_id','=',$userid)->first();
        $teacher->delete();
        $user = User::find($userid);
        $user->delete();
        return redirect('/dashboard')->with('status','Teacher deleted successfully');
    }
}
