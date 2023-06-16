<?php

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
Route::get('/courses',[\App\Http\Controllers\Admin\CourseController::class,'index']);
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get('dashboard',[\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('courses',[\App\Http\Controllers\Admin\CourseController::class, 'index']);
    Route::get('add-courses',[\App\Http\Controllers\Admin\CourseController::class, 'add']);
    Route::post('insert-courses',[\App\Http\Controllers\Admin\CourseController::class, 'insert']);
    Route::get('edit-course/{id}',[\App\Http\Controllers\Admin\CourseController::class,'edit']);
    Route::put('update-course/{id}',[\App\Http\Controllers\Admin\CourseController::class,'update']);
    Route::get('delete-course/{id}',[\App\Http\Controllers\Admin\CourseController::class,'delete']);

});
