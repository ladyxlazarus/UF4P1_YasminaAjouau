<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrelloController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/boards', [TrelloController::class, 'getBoards'])->name('api.boards.show');
    Route::get('/cards/{boardId}', [TrelloController::class, 'index'])->name('api.cards.index');
    Route::post('/cards', [TrelloController::class, 'storeCard'])->name('api.cards.store');
    Route::put('/cards/{id}', [TrelloController::class, 'update'])->name('api.cards.update');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback', 'AuthController@handleGoogleCallback');