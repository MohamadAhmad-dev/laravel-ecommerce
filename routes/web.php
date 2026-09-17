<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'home'])->name('home');
Route::get('/register',[AuthController::class,'registerPage'])->name('register');
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register.actions');
Route::post('/login',[AuthController::class,'login'])->name('login.actions');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/admin/home',[AdminController::class,'home'])->name('admin.home');
Route::get('/admin/users/all',[AdminController::class,'allUsers'])->name('users.all');
Route::get('/admin/users/active',[AdminController::class,'activeUsers'])->name('users.active');
Route::get('/admin/users/deleted',[AdminController::class,'deletedUsers'])->name('users.deleted');

Route::post('/admin/users/{id}/deleted',[AdminController::class,'deleteUser'])->name('user.delete');
Route::post('/admin/users/{id}/restore',[AdminController::class,'restoreUser'])->name('user.restore');
Route::post('/admin/users/{id}/forceDelete',[AdminController::class,'forceDeleteUser'])->name('user.forceDelete');
Route::post('/admin/users/{id}/toggle',[AdminController::class,'toggleUser'])->name('user.toggle');


