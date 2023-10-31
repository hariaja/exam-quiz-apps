<?php

use App\Helpers\Enums\RoleType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\HomeController;

$roles = implode(',', [RoleType::STUDENT->value]);

Route::prefix('students')->name('students.')->group(function () use ($roles) {
  Route::middleware([
    'auth',
    "check.role:{$roles}"
  ])->group(function () {
    // Beranda Pendonor
    Route::get('home', [HomeController::class, 'index'])->name('home');
  });
});
