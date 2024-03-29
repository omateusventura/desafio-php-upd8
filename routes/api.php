<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/clientes', [CustomerController::class, 'findAll']);
Route::get('/clientes/{id}', [CustomerController::class, 'findById']);
Route::post('/clientes',[CustomerController::class, 'create']);
Route::put('/clientes/{id}', [CustomerController::class, 'update']);
Route::delete('/clientes/{id}', [CustomerController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
