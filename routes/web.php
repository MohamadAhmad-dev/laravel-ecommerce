<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'Home'])->name('home');
Route::get('/register',[AuthController::class,'registerPage'])->name('register');
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
