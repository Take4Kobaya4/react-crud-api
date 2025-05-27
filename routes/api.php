<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::apiResource('tasks', TaskController::class);
// Route::middleware('auth:sanctum') ->group(function () {
// });
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
