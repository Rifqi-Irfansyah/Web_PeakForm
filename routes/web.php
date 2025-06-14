<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

Route::get('/', function() {return view('landing_page.landingPage');})->name('landingpage');
Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/exercises', [ExerciseController::class, 'index'])->middleware('auth')->name('exercises.index');
Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
Route::get('/exercises/{id}', [ExerciseController::class, 'show'])->name('exercises.show');
Route::get('/exercises/{id}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit');
Route::put('/exercises/{id}', [ExerciseController::class, 'update'])->name('exercises.update');
Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
