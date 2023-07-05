<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseVideoController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/courses',[CourseController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('coupons',[CouponController::class, 'index']);
    Route::post('insert-coupon',[CouponController::class, 'insert']);
    Route::get('edit-coupon/{id}',[CouponController::class, 'edit']);
    Route::get('delete-coupon/{id}',[CouponController::class, 'delete']);
    Route::put('update-coupon/{id}',[CouponController::class, 'update']);
    Route::get('add-coupon',[CouponController::class, 'add']);
    Route::get('courses',[CourseController::class, 'index']);
    Route::get('add-courses',[CourseController::class, 'add']);
    Route::post('insert-courses',[CourseController::class, 'insert']);
    Route::get('edit-course/{id}',[CourseController::class,'edit']);
    Route::put('update-course/{id}',[CourseController::class,'update']);
    Route::get('delete-course/{id}',[CourseController::class,'delete']);
    Route::get('course_videos',[CourseVideoController::class,'index']);
    Route::get('teachers',[TeacherController::class,'index']);
    Route::get('add-teacher',[TeacherController::class, 'assignRole']);
    Route::post('insert-teacher',[TeacherController::class,'insert']);
    Route::get('edit-teacher/{id}',[TeacherController::class,'edit']);
    Route::put('update-teacher/{id}',[TeacherController::class,'update']);
    Route::get('delete-teacher/{id}',[TeacherController::class,'delete']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
