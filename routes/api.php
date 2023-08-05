<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PreferenciaController;
use App\Http\Controllers\API\InteraccionController;
use App\Http\Controllers\API\PerroController;

Route::post('/perros/agregarpreferencia/{perro}', [PreferenciaController::class, 'store']);
Route::post('/perros/agregar/', [PerroController::class, 'store']);
Route::post('/perros/login/', [PerroController::class, 'login']);
Route::get('/perros/{perroInteresado}', [InteraccionController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
