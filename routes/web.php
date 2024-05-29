<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\Configuraciones\DatosEmpresaController;
use App\Http\Controllers\dyls\DashboardController;
// use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Reservas\CalendarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('login',[LoginController::class,'viewLogin'])->name('login');
    Route::post('login',[LoginController::class,'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::name('dyls.')->prefix('dyls')->group(function () {
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::name('reservas.')->prefix('reservas')->group(function () {
            Route::get('calendario', [CalendarioController::class, 'calendario'])->name('calendario');
        });
        Route::name('configuraciones.')->prefix('configuraciones')->group(function () {
            Route::get('datos-empresa', [DatosEmpresaController::class, 'datosEmpresa'])->name('datos-empresa');
        });
    });


});
