<?php

use App\Helpers\Enums\RoleType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\HomeController;
use App\Http\Controllers\Students\LessonController;
use App\Http\Controllers\Students\ResultController;

$roles = implode(',', [RoleType::STUDENT->value]);

Route::prefix('students')->name('students.')->group(function () use ($roles) {
  Route::middleware([
    'auth',
    "check.role:{$roles}"
  ])->group(function () {
    // Beranda Pendonor
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Lesson
    Route::resource('lessons', LessonController::class)->only('index', 'show');

    // Result
    Route::get('results/lessons/{lesson}', [ResultController::class, 'show'])->name('results.show');
    Route::get('results/create/{lesson}', [ResultController::class, 'create'])->name('results.create');
    Route::resource('results', ResultController::class)->only('index', 'store');
  });
});
