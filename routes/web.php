<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\LanguageController;

Route::controller(SessionsController::class)->group(function () {
    Route::view('login', 'sessions.create')->middleware('guest')->name('login');
    Route::post('login', 'store')->middleware('guest')->name('login.store');
    Route::post('logout', 'destroy')->middleware('auth')->name('destroy');
});

Route::controller(MovieController::class)->group(function () {
    Route::post('movies/create', 'store')->name('movies');
    Route::get('movies/{movie}/edit', 'edit')->middleware('auth')->name('movie.edit');
    Route::patch('movies/{movie}', 'update')->middleware('auth')->name('movie.update');
    Route::delete('movies/{movie}', 'destroy')->middleware('auth')->name('movie.delete');
    Route::view('movies/create', 'posts.create-movie')->middleware('auth')->name('movies.create');
    Route::get('movies/{movie}', 'show')->name('movies.show');
    Route::get('/movie/list', 'list')->name('movie.list');
});

Route::controller(QuoteController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('quotes', 'store')->name('quotes');
    Route::get('quotes/{quote}/edit', 'edit')->middleware('auth')->name('quote.edit');
    Route::patch('quotes/{quote}', 'update')->middleware('auth')->name('quote.update');
    Route::delete('quotes/{quote}', 'destroy')->middleware('auth')->name('quote.delete');
    Route::view('quotes/create', 'posts.create-quotes')->middleware('auth')->name('quotes.create');
    Route::get('/quote/list', 'list')->middleware('auth')->name('quote.list');
});

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');
