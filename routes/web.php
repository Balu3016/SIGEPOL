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
Route::get('/', function () {
    return view('welcome');
});





// segunda pagina DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


// PERFIL
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// 🔥 IMPORTAR EXCEL
Route::get('/reportes/importar', [ImportarReporteController::class, 'index']);

Route::post('/reportes/importar', [ImportarReporteController::class, 'importar']);


// 🔥 REPORTES
Route::get('/reportes', [ReporteController::class, 'index']);

Route::get('/reportes/crear', [ReporteController::class, 'create']);

Route::post('/reportes', [ReporteController::class, 'store']);

Route::get('/reportes/{id}', [ReporteController::class, 'show']);

Route::get('/reportes/{id}/edit', [ReporteController::class, 'edit']);

Route::put('/reportes/{id}', [ReporteController::class, 'update']);

Route::delete('/reportes/{id}', [ReporteController::class, 'destroy']);


// DETENIDOS
Route::get('/detenidos', [DetenidoController::class, 'index']);
Route::get('/detenidos/crear', [DetenidoController::class, 'create']);
Route::post('/detenidos', [DetenidoController::class, 'store']);

Route::get('/detenidos/{id}', [DetenidoController::class, 'show']);
Route::get('/detenidos/{id}/edit', [DetenidoController::class, 'edit']);
Route::put('/detenidos/{id}', [DetenidoController::class, 'update']);
Route::delete('/detenidos/{id}', [DetenidoController::class, 'destroy']);

// AUTH
require __DIR__.'/auth.php';