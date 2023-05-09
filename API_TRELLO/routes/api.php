<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrelloController;

Route::get('/', function () {
    return redirect()->route('boards.show'); // Redirigir a la página de tarjetas
});

Route::get('/boards', [TrelloController::class, 'getBoards'])->name('boards.show');
Route::get('/cards/create/{boardId}', [TrelloController::class, 'showCreateCardForm'])->name('cards.create');
Route::post('/cards', [TrelloController::class, 'storeCard'])->name('cards.store');
Route::get('/cards/{id}/edit', [TrelloController::class, 'edit'])->name('cards.edit');
Route::put('/cards/{id}', [TrelloController::class, 'update'])->name('cards.update');
Route::get('/cards/{boardId}', [TrelloController::class, 'index'])->name('cards.index');