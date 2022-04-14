<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    Route::post('/user-login',[UserController::class,'ApiLogin'])->name('user-login');

    Route::get('/get-students',[StudentController::class,'index'])->name('get-students');
    Route::get('/find-student/{id}',[StudentController::class,'find'])->name('find-student');
    Route::post('/store-student',[StudentController::class,'store'])->name('store-student');
    Route::post('/update-student',[StudentController::class,'update'])->name('update-student');

    //Courses
    Route::get('/get-courses',[CourseController::class,'getCourses'])->name('get-courses');

    Route::post('/store-assign-courses',[StudentController::class,'StoreAssignCourses'])->name('store-assign-courses');

    Route::post('/add-course',[CourseController::class,'addCourse'])->name('add-course');

    Route::get('/auth/user/{id}', [UserController::class, 'getUserAuth']);

    Route::get('student-courses/{id}',[StudentController::class,'getAssingStudentCourses'])->name('student-courses');

    });
    Route::get('/auth/user/{id}', [UserController::class, 'getUserAuth']);


//Login
Route::post('/api-login',[UserController::class,'ApiLogin'])->name('api-login');

Route::post('api-registerUser',[UserController::class,'registerUser'])->name('api-registerUser');




