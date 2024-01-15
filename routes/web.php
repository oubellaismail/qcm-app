<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FiliereController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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

Route::get('/user/create',[UserController::class,'create'])->name('user.create')->middleware('auth');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/user/auth', [UserController::class, 'auth'])->name('user.auth');
Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index')->middleware('auth');
Route::get('/quiz/create', [QuizController::class, 'create'])->middleware('auth');
Route::post('/quiz/store', [QuizController::class, 'store'])->middleware('auth');
Route::post('/quiz/check-answers', [QuizController::class, 'checkAnswers'])->middleware('auth');
Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create')->middleware('auth');
Route::get('/quiz/pass/{quiz}', [QuizController::class, 'pass'])->name('quiz.pass')->middleware('auth');
Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show')->middleware('auth');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index')->middleware('auth');
Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store')->middleware('auth');
Route::post('/quiz/check-answers', [QuizController::class, 'checkAnswers'])->name('quiz.checkAnswers')->middleware('auth');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit')->middleware('auth');

Route::get('/question/create/{quiz}', [QuestionController::class, 'create'])->name('question.create')->middleware('auth');
Route::post('/question/store/{quiz}', [QuestionController::class, 'store'])->name('question.store')->middleware('auth');
Route::post('/question/submit/{questions}', [QuizController::class, 'submit'])->name('question.submit')->middleware('auth');

Route::get('/student/index', [StudentController::class, 'index'])->name('student.index')->middleware('auth');

Route::get('/departements/', [DepartementController::class, 'index'])->name('departement.index')->middleware('auth');
Route::get('/departments/create', [DepartementController::class, 'create'])->name('departement.create');
Route::delete('/departments/delete/{departement}', [DepartementController::class, 'destroy'])->name('department.destroy');
Route::get('/departments/{departement}', [DepartementController::class, 'show'])->name('departement.show');
Route::post('/departments/store', [DepartementController::class, 'store'])->name('department.store');

Route::get('/filieres/', [FiliereController::class, 'index'])->name('filiere.index')->middleware('auth');
Route::post('/filieres/post', [FiliereController::class, 'post'])->name('filiere.post')->middleware('auth');
Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filiere.create')->middleware('auth');
Route::get('/filieres/students/{filiere}', [FiliereController::class, 'students'])->name('filiere.students')->middleware('auth');
Route::get('/filieres/professors/{filiere}', [FiliereController::class, 'professors'])->name('filiere.professors')->middleware('auth');

Route::get('/filiere/{filiere}/noprofessors', [FiliereController::class, 'notAssignedProfessors'])->name('filiere.no-assign-professors');
Route::post('filiere/{filiere}/assign-professors', [FiliereController::class, 'assignProfessors'])->name('filiere.assign-professors');