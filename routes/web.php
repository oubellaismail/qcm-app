<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GradeController;
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

Route::get('/', [UserController::class, 'login'])->name('user.login')->middleware('guest');

Route::prefix('/user')->controller(UserController::class)->group(function(){
    Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::post('/register', [UserController::class, 'store'])->name('user.store')->middleware('auth');
    Route::get('', [UserController::class, 'index'])->name('user.index')->middleware('auth');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::post('/auth', [UserController::class, 'auth'])->name('user.auth');
    Route::delete('/logout', [UserController::class, 'logout'])->name('user.logout');
});


Route::prefix('/quiz')->controller(UserController::class)->group(function(){

    Route::get('', [QuizController::class, 'index'])->name('quiz.index')->middleware('auth');
    Route::post('/toggle/{quiz}', [QuizController::class, 'toggle'])->name('quiz.toggleVisbility')->middleware('auth');
    Route::post('/store', [QuizController::class, 'store'])->name('quiz.store')->middleware('auth');
    Route::get('/create', [QuizController::class, 'create'])->name('quiz.create')->middleware('auth');
    Route::get('/pass/{quiz}', [QuizController::class, 'pass'])->name('quiz.pass')->middleware('auth');
    Route::get('/{quiz}', [QuizController::class, 'show'])->name('quiz.show')->middleware('auth');
    Route::post('/submit', [QuizController::class, 'submit'])->name('quiz.submit')->middleware('auth');
    Route::delete('/destroy/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy')->middleware('auth');
});

Route::prefix('/question')->controller(UserController::class)->group(function(){

    Route::get('/create/{quiz}', [QuestionController::class, 'create'])->name('question.create')->middleware('auth');
    Route::post('/store/{quiz}', [QuestionController::class, 'store'])->name('question.store')->middleware('auth');
    Route::post('/submit/{questions}', [QuizController::class, 'submit'])->name('question.submit')->middleware('auth');
});



Route::get('/student/index', [StudentController::class, 'index'])->name('student.index')->middleware('auth');


Route::prefix('/departements')->controller(UserController::class)->group(function () {

    Route::get('', [DepartementController::class, 'index'])->name('departement.index')->middleware('auth');
    Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
    Route::delete('/delete/{departement}', [DepartementController::class, 'destroy'])->name('department.destroy');
    Route::get('/{departement}', [DepartementController::class, 'show'])->name('departement.show');
    Route::post('/store', [DepartementController::class, 'store'])->name('department.store');
});

Route::prefix('/filieres')->controller(UserController::class)->group(function () {
    
    Route::get('/', [FiliereController::class, 'index'])->name('filiere.index')->middleware('auth');
    Route::get('/prof', [FiliereController::class, 'profFilieres'])->name('filiere.profIndex')->middleware('auth');
    Route::post('/store', [FiliereController::class, 'store'])->name('filiere.store')->middleware('auth');
    Route::get('/create', [FiliereController::class, 'create'])->name('filiere.create')->middleware('auth');
    Route::get('/students/{filiere}', [FiliereController::class, 'students'])->name('filiere.students')->middleware('auth');
    Route::get('/professors/{filiere}', [FiliereController::class, 'professors'])->name('filiere.professors')->middleware('auth');
    Route::get('/noprofessors/{filiere}', [FiliereController::class, 'notAssignedProfessors'])->name('filiere.no-assign-professors')->middleware('auth');
    Route::post('/assign-professors/{filiere}', [FiliereController::class, 'assignProfessors'])->name('filiere.assign-professors')->middleware('auth');
    Route::post('/detachProfessor/{filiere}/{professor}', [FiliereController::class, 'detachProfessor'])->name('filiere.detachProfessor')->middleware('auth');
    Route::delete('/delete/{filiere}', [FiliereController::class, 'destroy'])->name('filiere.destroy');
    
});


Route::get('/grades', [GradeController::class, 'index'])->name('grade.index');