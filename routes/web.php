<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
Route::get('/exercises/{id}', [ExerciseController::class, 'show'])->name('exercises.show');
Route::get('/exercises/{id}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit');
Route::put('/exercises/{id}', [ExerciseController::class, 'update'])->name('exercises.update');
Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
