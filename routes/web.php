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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
});

Route::get('clock-in', [App\Http\Controllers\EmployeeController::class, 'clockIn'])->name('clock-in');

Route::get('/clock-in/employee-schedule',
[App\Http\Controllers\ClockInController::class, 'index'])
->name('employee-schedule');