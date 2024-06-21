<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\Configuraciones\DatosEmpresaController;
use App\Http\Controllers\dyls\configuraciones\CategoriaController;
use App\Http\Controllers\dyls\configuraciones\ClienteController;
use App\Http\Controllers\dyls\configuraciones\HabitacionController;
use App\Http\Controllers\dyls\configuraciones\NivelController;
use App\Http\Controllers\dyls\configuraciones\TarifaController;
use App\Http\Controllers\dyls\configuraciones\UsuarioController;
use App\Http\Controllers\dyls\DashboardController;
use App\Http\Controllers\dyls\RecepcionController;
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

        Route::name('recepcion.')->prefix('recepcion')->group(function () {
            Route::get('lista', [RecepcionController::class, 'lista'])->name('lista');
            Route::get('listar', [RecepcionController::class, 'listar'])->name('listar');
            Route::get('formulario/{id}', [RecepcionController::class, 'formulario'])->name('formulario');
            Route::get('guardar', [RecepcionController::class, 'guardar'])->name('guardar');
            Route::get('eliminar', [RecepcionController::class, 'eliminar'])->name('eliminar');
        });

        Route::name('configuraciones.')->prefix('configuraciones')->group(function () {
            // Route::get('datos-empresa', [DatosEmpresaController::class, 'datosEmpresa'])->name('datos-empresa');


            Route::name('usuarios.')->prefix('usuarios')->group(function () {
                Route::get('lista', [UsuarioController::class, 'lista'])->name('lista');
                Route::get('listar', [UsuarioController::class, 'listar'])->name('listar');
                Route::get('formulario', [UsuarioController::class, 'formulario'])->name('formulario');
                Route::get('guardar', [UsuarioController::class, 'guardar'])->name('guardar');
                Route::get('eliminar', [UsuarioController::class, 'eliminar'])->name('eliminar');
            });

            Route::name('niveles.')->prefix('niveles')->group(function () {
                Route::get('lista', [NivelController::class, 'lista'])->name('lista');
                Route::post('listar', [NivelController::class, 'listar'])->name('listar');
                Route::post('guardar', [NivelController::class, 'guardar'])->name('guardar');
                Route::get('editar/{id}', [NivelController::class, 'editar'])->name('editar');
                Route::put('eliminar/{id}', [NivelController::class, 'eliminar'])->name('eliminar');
            });

            Route::name('categorias.')->prefix('categorias')->group(function () {
                Route::get('lista', [CategoriaController::class, 'lista'])->name('lista');
                Route::post('listar', [CategoriaController::class, 'listar'])->name('listar');
                Route::post('guardar', [CategoriaController::class, 'guardar'])->name('guardar');
                Route::get('editar/{id}', [CategoriaController::class, 'editar'])->name('editar');
                Route::put('eliminar/{id}', [CategoriaController::class, 'eliminar'])->name('eliminar');
            });

            Route::name('habitaciones.')->prefix('habitaciones')->group(function () {
                Route::get('lista', [HabitacionController::class, 'lista'])->name('lista');
                Route::post('listar', [HabitacionController::class, 'listar'])->name('listar');
                Route::post('guardar', [HabitacionController::class, 'guardar'])->name('guardar');
                Route::get('editar/{id}', [HabitacionController::class, 'editar'])->name('editar');
                Route::put('eliminar/{id}', [HabitacionController::class, 'eliminar'])->name('eliminar');
            });
            Route::name('tarifas.')->prefix('tarifas')->group(function () {
                Route::get('lista', [TarifaController::class, 'lista'])->name('lista');
                Route::post('listar', [TarifaController::class, 'listar'])->name('listar');
                Route::post('guardar', [TarifaController::class, 'guardar'])->name('guardar');
                Route::get('editar/{id}', [TarifaController::class, 'editar'])->name('editar');
                Route::put('eliminar/{id}', [TarifaController::class, 'eliminar'])->name('eliminar');
            });
            Route::name('clientes.')->prefix('clientes')->group(function () {
                Route::get('lista', [ClienteController::class, 'lista'])->name('lista');
                Route::post('listar', [ClienteController::class, 'listar'])->name('listar');
                Route::post('guardar', [ClienteController::class, 'guardar'])->name('guardar');
                Route::get('editar/{id}', [ClienteController::class, 'editar'])->name('editar');
                Route::put('eliminar/{id}', [ClienteController::class, 'eliminar'])->name('eliminar');
            });
        });
    });


});
