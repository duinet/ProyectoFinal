<?php

use Illuminate\Support\Facades\Route;

// Controladores rutas
use App\Http\Controllers\Pagos\PagoController;
use App\Http\Controllers\Pagos\TipoPagosController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeDashboardController;

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

//Route::get('/tipopagos/pago/{id}', [PlantillaController::class,'pago']);
Route::get('/tipopagos/pago', [PlantillaController::class,'pago']);

Route::get('/dashboard/categories',[CategoriesController::class,'index'])->middleware(['auth']);

Route::get('/dashboard',[HomeDashboardController::class,'index'])->middleware(['auth']);


require __DIR__.'/auth.php';

// Socialite

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', [AuthenticatedSessionController::class, 'redirectToProvider']);
    Route::get('/{provider}/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);
});
Route::get('/reload-captcha', [AuthenticatedSessionController::class, 'reloadCaptcha']);


