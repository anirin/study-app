<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use  App\Http\Controllers\PostController;

Route::get('/', [StudyController::class, 'index'])->name('study.index');
Route::post('/store', [StudyController::class, 'store'])->name('study.store');
Route::post('/restore', [StudyController::class, 'restore'])->name('study.restore');
Route::get('/result', [StudyController::class, 'result'])->name('study.result');

//login系
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
