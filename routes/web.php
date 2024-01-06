<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\QuizController;


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

Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/auth', [UserController::class, 'auth'])->name('user.auth');
Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/quiz/create', [QuizController::class, 'create']);
Route::post('/quiz/store', [QuizController::class, 'store']);
Route::post('/quiz/check-answers', [QuizController::class, 'checkAnswers']);
