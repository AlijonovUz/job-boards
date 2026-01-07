<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

// Vacancies
Route::controller(VacancyController::class)->group(function () {
    Route::get('/', 'index')->name('vacancies.index');
    Route::get('/vacancies/{id}-{slug}', 'show')->name('vacancies.show');
    Route::get('/vacancies/{id}-{slug}/edit', 'edit')->name('vacancies.edit');
});

Route::resource('vacancies', VacancyController::class)
    ->except(['index', 'show', 'edit']);

// Auth
Route::prefix('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'index'])
            ->name('login');

        Route::post('login', [LoginController::class, 'store'])
            ->name('login.store');

        Route::resource('register', RegisterController::class)
            ->only(['index', 'store']);
    });
});

// Verification
Route::middleware(['auth', 'unverified'])->group(function () {

    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

// User
Route::prefix('profile')->group(function () {
    Route::get('/', [UserController::class, 'show'])
        ->name('profile');
    Route::get('edit', [UserController::class, 'edit'])
        ->name('profile.edit');
    Route::put('edit', [UserController::class, 'update'])
        ->name('profile.update');
    Route::delete('delete', [UserController::class, 'destroy'])
        ->name('profile.delete');
});


// Mail
Route::resource('mail', MailController::class);

// Notifications
Route::prefix('notifications')->group(function () {
    Route::post('{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');
    Route::post('read-all', [NotificationController::class, 'readAll'])->name('notifications.readAll');
});
