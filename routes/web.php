<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;


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
Route::get('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/user/auth', [UserController::class, 'auth'])->name('user.auth');
Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/create', [QuizController::class, 'create']);
Route::post('/quiz/store', [QuizController::class, 'store']);
Route::post('/quiz/check-answers', [QuizController::class, 'checkAnswers']);
Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
Route::post('/quiz/check-answers', [QuizController::class, 'checkAnswers'])->name('quiz.checkAnswers');

Route::get('/question/create/{quiz}', [QuestionController::class, 'create'])->name('question.create');
Route::post('/question/store/{quiz}', [QuestionController::class, 'store'])->name('question.store');
Route::post('/question/submit/{questions}', [QuizController::class, 'submit'])->name('question.submit');