<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VacancyController::class, 'index'])->name('vacancies.index');
Route::resource('vacancies', VacancyController::class);

Route::resource('login', LoginController::class);
Route::resource('register', RegisterController::class);
