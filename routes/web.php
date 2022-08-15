<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('register', [AuthController::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('register', [AuthController::class,'postregister'])->name('register.store');
Route::get('login', [AuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('login', [AuthController::class,'postlogin'])->name('login.store');

Route::get('home', [DashboardController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('logout', [DashboardController::class,'logout'])->name('logout');
