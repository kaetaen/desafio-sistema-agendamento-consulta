<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalConsultationController;
use App\Http\Controllers\PatientController;

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
Route::get('cidades/{id_cidade}/medicos', [DoctorController::class, 'getDoctorsByCity'])
    ->name('getDoctorsByCity');
Route::get('medicos', [DoctorController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('medicos', [DoctorController::class, 'create']);
    
    Route::post('medicos/consulta', [MedicalConsultationController::class, 'create'])->middleware('auth:api');
    Route::get('medicos/consulta', [MedicalConsultationController::class, 'index'])->middleware('auth:api');
    Route::get('medicos/{id_medico}/pacientes', [MedicalConsultationController::class, 'getPatients'])
        ->name('getPatients');

    Route::post('pacientes', [PatientController::class, 'create']);
    Route::put('pacientes/{id_paciente}', [PatientController::class, 'update']);
});

