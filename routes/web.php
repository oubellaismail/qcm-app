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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register',[UserController::class,'create'])->name('adding.one');
Route::post('/registrer', [RegisterController::class, 'store'])->name('store');
Route::get('/users', [UserController::class, 'index'])->name('home');
Route::delete('/task-destroy/{id}', [UserController::class, 'destroy'])->name('User.destroy');

