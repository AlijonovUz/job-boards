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

Route::resource('login', LoginController::class);
Route::resource('register', RegisterController::class);
