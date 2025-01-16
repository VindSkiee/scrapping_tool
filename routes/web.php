<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScrapController;

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login.index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/index',[ScrapController::class, 'showIndex'])->name('index');
    Route::post('/scrape', [ScrapController::class, 'scrape'])->name('scrape');
});



