<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Rutas para la Configuración del Sistema
Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::post('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');

// Rutas para Gestiones
Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('admin.gestion.index')->middleware('auth');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('admin.gestion.create')->middleware('auth');
Route::post('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'store'])->name('admin.gestion.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('admin.gestion.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('admin.gestion.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('admin.gestion.destroy')->middleware('auth');

// Rutas para Niveles
Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('admin.nivel.index')->middleware('auth');
/* Route::get('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'create'])->name('admin.nivel.create')->middleware('auth'); */
Route::post('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'store'])->name('admin.nivel.store')->middleware('auth');
Route::get('/admin/niveles/{id}/edit', [App\Http\Controllers\NivelController::class, 'edit'])->name('admin.nivel.edit')->middleware('auth');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('admin.nivel.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('admin.nivel.destroy')->middleware('auth');