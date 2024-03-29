<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/clientes', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/clientes/editar/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::get('/clientes/cadastro', function() {
    return view('customers.add');
});

