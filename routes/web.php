<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use  App\Http\Controllers\PostController;

Route::get('/', [StudyController::class, 'index'])->name('study.create');
Route::post('/store', [StudyController::class, 'store'])->name('study.store');
Route::post('/restore', [StudyController::class, 'restore'])->name('study.restore');
