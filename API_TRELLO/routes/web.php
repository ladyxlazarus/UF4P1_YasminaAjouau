<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrelloController;

Route::get('/', function () {
    return redirect()->route('boards.show'); // Redirigir a la página de tarjetas
});