<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlosarioController;
use App\Http\Controllers\NuevoController;
use App\Http\Controllers\EditarController;

Route::get('/', [GlosarioController::class, 'index'])->name('glosario.index');
Route::get('/about', [GlosarioController::class, 'about'])->name('glosario.about');
Route::get('/nuevo', [NuevoController::class, 'index'])->name('nuevo');
Route::get('/editar', [EditarController::class, 'index'])->name('editar');
Route::get('/', [GlosarioController::class, 'index'])->name('index');
Route::get('/editar', [GlosarioController::class, 'editar'])->name('editar');
Route::get('/editar/{id}', [GlosarioController::class, 'editarConcepto'])->name('editar_concepto');





Route::post('/guardar-concepto', [NuevoController::class, 'guardarConcepto'])->name('guardar_concepto');
Route::post('/guardar-cambios', [EditarController::class, 'guardarCambios'])->name('guardar_cambios');

// Resto de tus rutas...






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

/*Route::get('/', function () {
    return view('welcome');

});*/
