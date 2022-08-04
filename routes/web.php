<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\SecretariasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('modulos.seleccionar');
});

Route::get('/ingresar', function () {
    return view('modulos.ingresar');
});

Route::get('/inicio', [InicioController::class, 'index']);
Route::get('/consultorios', [ConsultorioController::class, 'index']);
Route::post('/consultorios', [ConsultorioController::class, 'store']);
Route::put('Consultorio/{id}', [ConsultorioController::class, 'update']);
Route::delete('borrar-consultorio/{id}', [ConsultorioController::class, 'destroy']);
Route::get('doctores', [DoctoresController::class, 'index']);
Route::post('doctores', [DoctoresController::class, 'store']);
Route::get('eliminar-doctor/{id}', [DoctoresController::class, 'destroy']);

Route::get('pacientes', [PacientesController::class, 'index']);
Route::get('crear-paciente', [PacientesController::class, 'create']);
Route::post('crear-paciente', [PacientesController::class, 'store']);
Route::get('editar-paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('eliminar-paciente/{id}', [PacientesController::class, 'destroy']);

Route::get('citas/{id}', [CitasController::class, 'index']);
Route::post('horario', [CitasController::class, 'horarioDoctor']);
Route::put('editar-horario/{id}', [CitasController::class, 'editarHorario']);

Route::post('citas/{doctor_id}', [CitasController::class, 'crearCita']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);

Route::get('ver-consultorios', [ConsultorioController::class, 'verConsultorios']);
Route::get('ver-doctores/{id}', [DoctoresController::class, 'verDoctores']);
Route::get('historial', [CitasController::class, 'historial']);

Route::get('secretarias', [SecretariasController::class, 'index']);
Route::post('secretarias', [SecretariasController::class, 'store']);
Route::get('eliminar-secretaria/{id}', [SecretariasController::class, 'destroy']);
Route::get('editar-secretaria/{id}', [SecretariasController::class, 'show']);
Route::put('actualizar-secretaria/{secretaria}', [SecretariasController::class, 'update']);

Route::get('mis-datos', [InicioController::class, 'datosCreate']);
Route::put('mis-datos', [InicioController::class, 'datosUpdate']);
Route::get('inicio-editar', [InicioController::class, 'edit']);
Route::put('inicio-editar', [InicioController::class, 'update']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
