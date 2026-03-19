<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::post('/register', [AuthController::class, 'register']);
<<<<<<< HEAD
Route::post('/login',    [AuthController::class, 'login']);
=======
Route::post('/login', [AuthController::class, 'login']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user/id', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
>>>>>>> 706dfaecceebc9ef4015bd844a74f27c633490e9

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::get('/user',[AuthController::class, 'me']);
    Route::post('/tasks',[TaskController::class, 'crearTarea']);
    Route::get('/tasks',[TaskController::class, 'traerTareas']);
    Route::get('/tasks/{usuario}',[TaskController::class, 'traerTareasPorUsuario']);
    Route::put('/tasks/{id}',[TaskController::class, 'actualizarTarea']);
    Route::delete('/tasks/{id}',[TaskController::class, 'borrarTarea']);
    Route::delete('/tasks/usuario/{usuario}',[TaskController::class, 'borrarTareasPorUsuario']);
});