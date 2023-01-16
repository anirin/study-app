<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [StudyController::class, 'login'])->name('study.login');
Route::get('/index', [StudyController::class, 'index'])->name('study.index');
Route::post('/store', [StudyController::class, 'store'])->name('study.store');
Route::post('/restore', [StudyController::class, 'restore'])->name('study.restore');
Route::get('/result', [StudyController::class, 'result'])->name('study.result');
Route::get('/ranking', [StudyController::class, 'comment'])->name('study.ranking');
Route::post('/ranking', [StudyController::class, 'post'])->name('study.post');
Route::get('/setting', [StudyController::class, 'show_setting'])->name('study.show_setting');
Route::put('/setting', [StudyController::class, 'setting'])->name('study.setting');

Route::get('/calendar', function () {
    return view('calendar');
});
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');

require __DIR__.'/auth.php';


