<?php

use App\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrolleeController;

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
Route::post('/enrollee-store', [EnrolleeController::class, 'store']);
Route::get('/enrollee-edit/{id}', [EnrolleeController::class, 'edit']);
Route::put('/enrollee-update/{id}', [EnrolleeController::class, 'update']);
Route::get('/colleges', [EnrolleeController::class, 'getColleges'])->middleware('AuthCheck');
Route::get('/programs', [EnrolleeController::class, 'getPrograms'])->middleware('AuthCheck');
Route::get('/courses', [EnrolleeController::class, 'getCourses'])->middleware('AuthCheck');
Route::get('/enrollees', [EnrolleeController::class, 'index'])->middleware('AuthCheck');
Route::get('/enrollees/{id}', [EnrolleeController::class, 'show']);
Route::get('/enrollee-add', [EnrolleeController::class, 'create']);
Route::get('/enrollee-destroy/{id}',[EnrolleeController::class, 'destroy']);
Route::get('/get-enrollee/{id}', [EnrolleeController::class, 'getEnrollee']);

Route::get('/logout', [EnrolleeController::class, 'logout']);
Route::post('/check', [EnrolleeController::class, 'check']);
Route::get('/login', [EnrolleeController::class, 'login'])->middleware('AuthCheck');

Route::get('/get-college', [CollegeController::class, 'index']);
Route::get('/get-program/{id}', [CollegeController::class, 'getPrograms']);
Route::get('/get-course/{id}', [CollegeController::class, 'getCourses']);



