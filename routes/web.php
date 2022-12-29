<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [StudyController::class, 'index'])->name('study.index');
Route::post('/store', [StudyController::class, 'store'])->name('study.store');
Route::post('/restore', [StudyController::class, 'restore'])->name('study.restore');
Route::get('/result', [StudyController::class, 'result'])->name('study.result');
Route::get('/ranking', [StudyController::class, 'comment'])->name('study.ranking');
Route::post('/ranking', [StudyController::class, 'post'])->name('study.post');
Route::get('/setting', [StudyController::class, 'show_setting'])->name('study.show_setting');
Route::put('/setting', [StudyController::class, 'setting'])->name('study.setting');

require __DIR__.'/auth.php';


