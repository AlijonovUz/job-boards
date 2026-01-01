<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/{id}-{slug}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::get('/vacancies/{id}-{slug}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::resource('vacancies', VacancyController::class)
    ->except(['show', 'edit']);

Route::post('auth/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('auth/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('auth/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::resource('auth/register', RegisterController::class)
    ->middleware('guest');
