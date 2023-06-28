<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('polyclinics', App\Http\Controllers\PolyclinicController::class);
Route::resource('doctors', App\Http\Controllers\DoctorController::class);
Route::resource('account', App\Http\Controllers\UserController::class);
Route::post('polyclinics/get-doctor', [\App\Http\Controllers\AppointmentController::class, 'getDoctor']); 
Route::resource('appointments', \App\Http\Controllers\AppointmentController::class); 
