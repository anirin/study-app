<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TwitterController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

//ログイン関係（Auth）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

//最初の画面
Route::get('/', [StudyController::class, 'index'])->name('study.index');
// 勉強時間の記録
Route::post('/store', [StudyController::class, 'store'])->name('study.store');
Route::post('/restore', [StudyController::class, 'restore'])->name('study.restore');
// 学習記録
Route::get('/result', [StudyController::class, 'result'])->name('study.result');
// 設定
Route::get('/setting', [StudyController::class, 'show_setting'])->name('study.show_setting');
Route::put('/setting', [StudyController::class, 'setting'])->name('study.setting');
//ログアウト
Route::get('/logout', [StudyController::class, 'logout'])->name('study.logout');
//カレンダー関連
Route::get('/calendar', function() {return view('calendar');})->name('get-calendar');
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
// Twitter関連
Route::get('login/twitter', [TwitterController::class, 'redirectToProvider'])->name('login.twitter');
Route::get('login/twitter/callback', [TwitterController::class, 'handleProviderCallback']);

