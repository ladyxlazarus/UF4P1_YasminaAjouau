<?php

use App\Http\Controllers\TMDBController;
use App\Http\Controllers\TrelloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/boards', [TrelloController::class, 'getBoards'])->name('boards.show');
    Route::get('/cards/create/{boardId}', [TrelloController::class, 'showCreateCardForm'])->name('cards.create');
    Route::post('/cards', [TrelloController::class, 'storeCard'])->name('cards.store');
    Route::get('/cards/{id}/edit', [TrelloController::class, 'edit'])->name('cards.edit');
    Route::put('/cards/{id}', [TrelloController::class, 'update'])->name('cards.update');
    Route::get('/cards/{boardId}', [TrelloController::class, 'index'])->name('cards.index');
    Route::get('/tvshows', [TMDBController::class, 'indexS'])->name('movies.indexShows');
    Route::get('/movies', [TMDBController::class, 'indexM'])->name('movies.indexMovies');
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found'], 404);
});
