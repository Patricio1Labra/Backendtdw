<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PreferenciaController;
use App\Http\Controllers\API\InteraccionController;

Route::post('/perros/agregar/{perro}', [PreferenciaController::class, 'store']);
Route::get('/perros/{perroInteresado}', [InteraccionController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
