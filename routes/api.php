<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout',[AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::get('cidades', [CityController::class, 'index']);

Route::get('medicos', [DoctorController::class, 'index']);
Route::post('medicos', [DoctorController::class, 'create'])->middleware('auth:api');
Route::get('cidades/{id_cidade}/medicos', [DoctorController::class, 'getDoctorsByCity'])->name('getDoctorsByCity');


