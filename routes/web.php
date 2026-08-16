<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ImportarReporteController;
use App\Http\Controllers\DetenidoController;


/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| IMPORTAR EXCEL
|--------------------------------------------------------------------------
*/

Route::get('/reportes/importar', [ImportarReporteController::class, 'index'])
    ->middleware('auth')
    ->name('reportes.importar');

Route::post('/reportes/importar', [ImportarReporteController::class, 'importar'])
    ->middleware('auth')
    ->name('reportes.importar.procesar');


/*
|--------------------------------------------------------------------------
| REPORTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Lista de reportes
    Route::get('/reportes', [ReporteController::class, 'index'])
        ->name('reportes.index');

    // Crear reporte
    Route::get('/reportes/crear', [ReporteController::class, 'create'])
        ->name('reportes.create');

    // Guardar reporte
    Route::post('/reportes', [ReporteController::class, 'store'])
        ->name('reportes.store');

    // Mostrar reporte
    Route::get('/reportes/{id}', [ReporteController::class, 'show'])
        ->name('reportes.show');

    // Editar reporte
    Route::get('/reportes/{id}/edit', [ReporteController::class, 'edit'])
        ->name('reportes.edit');

    // Actualizar reporte
    Route::put('/reportes/{id}', [ReporteController::class, 'update'])
        ->name('reportes.update');

    // Eliminar reporte
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])
        ->name('reportes.destroy');

});


/*
|--------------------------------------------------------------------------
| DETENIDOS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    | LISTA DE DETENIDOS
    */

    Route::get('/detenidos', [DetenidoController::class, 'index'])
        ->name('detenidos.index');


    /*
    | FORMULARIO NUEVO DETENIDO
    */

    Route::get('/detenidos/crear', [DetenidoController::class, 'create'])
        ->name('detenidos.create');


    /*
    | GUARDAR DETENIDO
    */

    Route::post('/detenidos', [DetenidoController::class, 'store'])
        ->name('detenidos.store');


    /*
    | MOSTRAR DETENIDO
    */

    Route::get('/detenidos/{id}', [DetenidoController::class, 'show'])
        ->name('detenidos.show');


    /*
    | FORMULARIO EDITAR DETENIDO
    */

    Route::get('/detenidos/{id}/edit', [DetenidoController::class, 'edit'])
        ->name('detenidos.edit');


    /*
    | ACTUALIZAR DETENIDO
    */

    Route::put('/detenidos/{id}', [DetenidoController::class, 'update'])
        ->name('detenidos.update');


    /*
    | ELIMINAR DETENIDO
    */

    Route::delete('/detenidos/{id}', [DetenidoController::class, 'destroy'])
        ->name('detenidos.destroy');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';