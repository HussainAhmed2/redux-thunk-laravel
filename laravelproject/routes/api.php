<?php

use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('api-student',[StudentController::class,'index'])->name("api-student");
Route::get('api-selected-student/{id}',[StudentController::class,'find'])->name("api-selected-student");
Route::post('api-student-store',[StudentController::class,'store'])->name("api-student-store");
Route::post('api-student-edit',[StudentController::class,'Edit'])->name("api-student-edit");
Route::get('api-student-delete/{id}',[StudentController::class,'Delete'])->name("api-student-delete");
