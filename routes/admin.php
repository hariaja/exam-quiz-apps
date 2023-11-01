<?php

use App\Helpers\Enums\RoleType;
use App\Http\Controllers\Consoles\Exams\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Consoles\HomeController;
use App\Http\Controllers\Consoles\Masters\CategoryController;
use App\Http\Controllers\Consoles\Masters\LessonController;
use App\Http\Controllers\Consoles\Masters\LevelController;
use App\Http\Controllers\Consoles\Settings\RoleController;
use App\Http\Controllers\Consoles\Settings\UserController;
use App\Http\Controllers\Consoles\Settings\PasswordController;

// Define Role
$roles = implode(',', [RoleType::ADMIN->value]);

Route::prefix('consoles')->group(function () use ($roles) {
  // Home Base
  Route::get('/home', [HomeController::class, 'index'])
    ->middleware("check.role:{$roles}")
    ->name('home');

  Route::middleware([
    'auth',
    'permission',
    "check.role:{$roles}",
  ])->group(function () {
    Route::prefix('settings')->group(function () {
      // Role management.
      Route::resource('roles', RoleController::class)->except('show', 'create', 'store');

      // User management.
      Route::patch('users/status/{user}', [UserController::class, 'status'])->name('users.status');
      Route::resource('users', UserController::class);
    });

    // Management password users.
    Route::get('users/password/{user}', [PasswordController::class, 'showChangePasswordForm'])->name('users.password');
    Route::post('users/password', [PasswordController::class, 'store']);

    Route::prefix('masters')->group(function () {
      // Level
      Route::resource('levels', LevelController::class)->except('show');

      // Category
      Route::resource('categories', CategoryController::class)->except('show');

      // Lesson Management.
      Route::resource('lessons', LessonController::class);
    });

    Route::prefix('exams')->group(function () {
      // Questions
      Route::resource('questions', QuestionController::class);
    });
  });
});
