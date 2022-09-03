<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;

Route::get('/', [QuotesController::class, 'index'])->name('index');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('destroy');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('movies/create', [MoviesController::class, 'create'])->middleware('auth')->name('movies.create');
Route::post('movies', [MoviesController::class, 'store'])->name('movies');
Route::get('movies/{movie:slug}', [QuotesController::class, 'show'])->name('movies.show');

Route::get('quotes/create', [QuotesController::class, 'create'])->middleware('auth')->name('quotes.create');
Route::post('quotes', [QuotesController::class, 'store'])->name('quotes');

Route::get('quotes/{quote}/edit', [DashboardController::class, 'edit'])->middleware('auth')->name('quote.edit');
Route::patch('quotes/{quote}', [DashboardController::class, 'update'])->middleware('auth')->name('quote.update');
Route::delete('quotes/{quote}', [DashboardController::class, 'destroy'])->middleware('auth')->name('quote.delete');
