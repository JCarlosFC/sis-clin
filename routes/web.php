<?php

use Illuminate\Support\Facades\Route;
/*use App\Models\Especialidad;
use App\Models\Medico;*/
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

Route::get('/laravel', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');
Route::get('/persona', [App\Http\Controllers\PersonaController::class, 'persona'])->name('persona');
Route::get('/persona/avatar/{filename}', [App\Http\Controllers\PersonaController::class, 'getImage'])->name('persona.avatar');
Route::get('/persona/search', [App\Http\Controllers\PersonaController::class, 'search'])->name('persona.search');
Route::get('/persona/create', [App\Http\Controllers\PersonaController::class, 'create'])->name('persona.create');
Route::get('/persona/{id}/edit', [App\Http\Controllers\PersonaController::class, 'edit'])->name('persona.edit');
Route::post('/persona/save', [App\Http\Controllers\PersonaController::class, 'save'])->name('persona.save');
Route::post('/persona/update/{id}', [App\Http\Controllers\PersonaController::class, 'update'])->name('persona.update');
Route::get('/medico', [App\Http\Controllers\MedicoController::class, 'medico'])->name('medico');
Route::get('/medico/create', [App\Http\Controllers\MedicoController::class, 'create'])->name('medico.create');
Route::post('/medico/save', [App\Http\Controllers\MedicoController::class, 'save'])->name('medico.save');
Route::get('/medico/search', [App\Http\Controllers\MedicoController::class, 'search'])->name('medico.search');
Route::get('/medico/{id}/edit', [App\Http\Controllers\MedicoController::class, 'edit'])->name('medico.edit');
Route::post('/medico/update/{id}', [App\Http\Controllers\MedicoController::class, 'update'])->name('medico.update');
Route::get('/medico/avatar/{filename}', [App\Http\Controllers\MedicoController::class, 'getImage'])->name('medico.avatar');
Route::get('/especialidad', [App\Http\Controllers\EspecialidadController::class, 'especialidad'])->name('especialidad');
Route::get('/especialidad/create', [App\Http\Controllers\EspecialidadController::class, 'create'])->name('especialidad.create');
Route::post('/especialidad/save', [App\Http\Controllers\EspecialidadController::class, 'save'])->name('especialidad.save');
Route::post('especialidad/agregarmedico/{id}', [App\Http\Controllers\EspecialidadController::class, 'agregarmedico'])->name('especialidad.agregarmedico');
Route::get('/especialidad/{id}/medicos', [App\Http\Controllers\EspecialidadController::class, 'medicos'])->name('especialidad.medicos');
Route::get('/especialidad/{id}/edit', [App\Http\Controllers\EspecialidadController::class, 'edit'])->name('especialidad.edit');
Route::post('/especialidad/update/{id}', [App\Http\Controllers\EspecialidadController::class, 'update'])->name('especialidad.update');

Route::get('/especialidad/test', [App\Http\Controllers\EspecialidadController::class, 'test'])->name('especialidad.test');
Route::get('/medico/test', [App\Http\Controllers\MedicoController::class, 'test'])->name('medico.test');

Route::get('/search/medicos', [App\Http\Controllers\EspecialidadController::class, 'searchMedicos'])->name('search.medicos');
Route::get('/search/medicoscita', [App\Http\Controllers\EspecialidadController::class, 'searchMedicosCita'])->name('search.medicoscita');

Route::get('/search/especialidad', [App\Http\Controllers\EspecialidadController::class, 'searchEspecialidad'])->name('search.especialidad');

Route::get('/cita', [App\Http\Controllers\CitaController::class, 'cita'])->name('cita');
Route::get('/cita/create', [App\Http\Controllers\CitaController::class, 'create'])->name('cita.create');


