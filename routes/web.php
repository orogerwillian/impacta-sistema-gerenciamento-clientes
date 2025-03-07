<?php

use App\Http\Controllers\Admin\ClientesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'Listagem'])->name('clientes.listagem');
    Route::get('/novo', [ClientesController::class, 'Novo'])->name('clientes.novo');
    Route::post('/salvar', [ClientesController::class, 'SalvarCliente'])->name('clientes.salvar');
    Route::get('/visualizar/{id:int}', [ClientesController::class, 'Visualizar'])->name('clientes.visualizar');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
