<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseVideoController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/courses',[CourseController::class,'index']);
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get('dashboard',[AdminController::class, 'index']);
    Route::get('courses',[CourseController::class, 'index']);
    Route::get('add-courses',[CourseController::class, 'add']);
    Route::post('insert-courses',[CourseController::class, 'insert']);
    Route::get('edit-course/{id}',[CourseController::class,'edit']);
    Route::put('update-course/{id}',[CourseController::class,'update']);
    Route::get('delete-course/{id}',[CourseController::class,'delete']);
    Route::get('course_videos',[CourseVideoController::class,'index']);
    Route::get('teachers',[TeacherController::class,'index']);
    Route::get('add-teacher',[TeacherController::class,'add']);
    Route::post('insert-teacher',[TeacherController::class,'insert']);
    Route::get('edit-teacher/{id}',[TeacherController::class,'edit']);
    Route::put('update-teacher/{id}',[TeacherController::class,'update']);
    Route::get('delete-teacher/{id}',[TeacherController::class,'delete']);

});
