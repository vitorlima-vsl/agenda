<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/create', [ContatoController::class, 'create'])->name('contatos.create');
