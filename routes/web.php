<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelHasRolController;

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    $controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    //Redirección vista formulario
    Route::get('/crear-usuario', [UserController::class, 'create'])->name('crear-usuario');
    Route::get('/hacer-trabajador', [ModelHasRolController::class, 'hacerTrabajador'])->name('hacer-trabajador');

    //Envio de datos
    Route::post('/crear-usuario', [UserController::class, 'store'])->name('guardar-usuario');
    Route::post('/asignar-trabajador', [ModelHasRolController::class, 'store'])->name('guardar-trabajador');

    //Rutas para la edición del usuario
    Route::get('/usuarios/{usuario}/editar', [UserController::class, 'edit'])->name('usuarios.editar');
    Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.actualizar');

    //Ruta para eliminarlo
    Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.eliminar');

});
