<?php

use Illuminate\Support\Facades\Route;

// Controladores rutas
use App\Http\Controllers\Pagos\PagoController;
use App\Http\Controllers\Pagos\TipoPagosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/tipopagos', [TipoPagosController::class, 'index']);

Route::get('/tipopagos/pago',[PagoController::class,'index']);

require __DIR__.'/auth.php';

// Socialite

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', [AuthenticatedSessionController::class, 'redirectToProvider']);
    Route::get('/{provider}/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);
});
Route::get('/reload-captcha', [AuthenticatedSessionController::class, 'reloadCaptcha']);


