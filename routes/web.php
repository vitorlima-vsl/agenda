<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/create', [ContatoController::class, 'create'])->name('contatos.create');
Route::post('/store', [ContatoController::class, 'store'])->name('contatos.store');
Route::get('/edit/{id}', [ContatoController::class, 'edit'])->name('contatos.edit');
Route::put('/update/{id}', [ContatoController::class, 'update'])->name('contatos.update');
Route::delete('/destroy/{id}', [ContatoController::class, 'destroy'])->name('contatos.destroy');
Route::get('/show/{id}', [ContatoController::class, 'show'])->name('contatos.show');    
