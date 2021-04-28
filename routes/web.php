<?php

use Illuminate\Support\Facades\Route;

// Controladores rutas
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\Pagos\PagoController;
use App\Http\Controllers\Admin\CursosController;
use App\Http\Controllers\Admin\ComptesController;
use App\Http\Controllers\Admin\UsuarisController;
use App\Http\Controllers\Admin\PagamentsController;
use App\Http\Controllers\Pagos\TipoPagosController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/',  [PlantillaController::class, 'welcome']);

Route::get('/tipopagos', [PlantillaController::class, 'tipopagos']);

Route::get('/tipopagos/pago/{id}', [PlantillaController::class,'pago']);
//Route::get('/tipopagos/pago', [PlantillaController::class,'pago']);

// dashboard routes

// CATEGORIES
Route::get('/dashboard/categories',[CategoriesController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/categories/add',[CategoriesController::class,'add'])->middleware(['auth']);
Route::get('/dashboard/categories/activate/{id}',[CategoriesController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/categories/desactivate/{id}',[CategoriesController::class,'desactivate'])->middleware(['auth']);

// COMPTES
Route::get('/dashboard/comptes',[ComptesController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/comptes/add',[ComptesController::class,'add'])->middleware(['auth']);
Route::get('/dashboard/comptes/activate/{id}',[ComptesController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/comptes/desactivate/{id}',[ComptesController::class,'desactivate'])->middleware(['auth']);

// PAGAMENTS
Route::get('/dashboard/pagaments',[PagamentsController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/pagaments/add',[PagamentsController::class,'add'])->middleware(['auth']);
Route::get('/dashboard/pagaments/activate/{id}',[PagamentsController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/pagaments/desactivate/{id}',[PagamentsController::class,'desactivate'])->middleware(['auth']);

// CURSOS
Route::get('/dashboard/cursos',[CursosController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/cursos/add',[CursosController::class,'add'])->middleware(['auth']);
Route::get('/dashboard/cursos/activate/{id}',[cursosController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/cursos/desactivate/{id}',[cursosController::class,'desactivate'])->middleware(['auth']);

// USUARIS
Route::get('/dashboard/usuaris',[UsuarisController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/usuaris/add',[UsuarisController::class,'add'])->middleware(['auth']);
Route::get('/dashboard/usuaris/delete/{id}',[UsuarisController::class,'delete'])->middleware(['auth']);

// HOME
Route::get('/dashboard',[HomeDashboardController::class,'index'])->middleware(['auth']);


require __DIR__.'/auth.php';

// Socialite

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', [AuthenticatedSessionController::class, 'redirectToProvider']);
    Route::get('/{provider}/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);
});
Route::get('/reload-captcha', [AuthenticatedSessionController::class, 'reloadCaptcha']);


