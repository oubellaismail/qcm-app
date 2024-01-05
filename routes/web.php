<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;

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

//Route User routes

Route::get('/user/create',[UserController::class,'create'])->name('user.create')->middleware('auth');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/user/auth', [UserController::class, 'auth'])->name('user.auth');
Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

