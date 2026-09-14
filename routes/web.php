<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'home'])->name('home');
Route::get('/register',[AuthController::class,'registerPage'])->name('register');
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register.actions');
Route::post('/login',[AuthController::class,'login'])->name('login.actions');
