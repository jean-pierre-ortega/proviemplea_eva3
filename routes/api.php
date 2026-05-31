<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AdministracionController;

Route::get('/health', HealthController::class);

Route::get('/personas', [PersonaController::class, 'index']);
Route::post('/personas', [PersonaController::class, 'store']);
Route::get('/personas/{id}', [PersonaController::class, 'show']);
Route::put('/personas/{id}', [PersonaController::class, 'update']);
Route::delete('/personas/{id}', [PersonaController::class, 'destroy']);
Route::patch('/personas/{id}/validar', [PersonaController::class, 'validar']);

Route::get('/empresas', [EmpresaController::class, 'index']);
Route::post('/empresas', [EmpresaController::class, 'store']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);
Route::patch('/empresas/{id}/validar', [EmpresaController::class, 'validar']);

Route::get('/admin/contactos', [AdministracionController::class, 'listarContactos']);
Route::post('/admin/contactos', [AdministracionController::class, 'crearContacto']);
Route::patch('/admin/contactos/{id}', [AdministracionController::class, 'actualizarEstado']);
Route::get('/admin/estadisticas', [AdministracionController::class, 'estadisticas']);
