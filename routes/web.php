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
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\PersonasPagoController;
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
// HOME
Route::get('/',  [PlantillaController::class, 'welcome']);

// TIPOPAGOS
Route::get('/tipopagos/{id}', [PlantillaController::class, 'tipopagos']);

// PAGO
Route::get('/tipopagos/pago/{id}', [PlantillaController::class,'pago']);
Route::post('/tipopagos/pago/add', [PlantillaController::class,'personapago']);

// dashboard routes

// CATEGORIES
Route::get('/dashboard/categories',[CategoriesController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/categories/add',[CategoriesController::class,'add'])->middleware(['auth']);
Route::post('/dashboard/categories/edit/{id}',[CategoriesController::class,'edit'])->middleware(['auth']);
Route::get('/dashboard/categories/activate/{id}',[CategoriesController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/categories/desactivate/{id}',[CategoriesController::class,'desactivate'])->middleware(['auth']);
Route::get('/dashboard/categories/delete/{id}',[CategoriesController::class,'delete'])->middleware(['auth']);
Route::get('/dashboard/categories/exportExel',[CategoriesController::class,'exportExel'])->middleware(['auth']);
Route::get('/dashboard/categories/exportPdf',[CategoriesController::class,'exportPdf'])->middleware(['auth']);

// COMPTES
Route::get('/dashboard/comptes',[ComptesController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/comptes/add',[ComptesController::class,'add'])->middleware(['auth']);
Route::post('/dashboard/comptes/edit/{id}',[ComptesController::class,'edit'])->middleware(['auth']);
Route::get('/dashboard/comptes/activate/{id}',[ComptesController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/comptes/desactivate/{id}',[ComptesController::class,'desactivate'])->middleware(['auth']);
Route::get('/dashboard/comptes/delete/{id}',[ComptesController::class,'delete'])->middleware(['auth']);
Route::get('/dashboard/comptes/exportExel',[ComptesController::class,'exportExel'])->middleware(['auth']);
Route::get('/dashboard/comptes/exportPdf',[ComptesController::class,'exportPdf'])->middleware(['auth']);

// PAGAMENTS
Route::get('/dashboard/pagaments',[PagamentsController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/pagaments/add',[PagamentsController::class,'add'])->middleware(['auth']);
Route::post('/dashboard/pagaments/edit/{id}',[PagamentsController::class,'edit'])->middleware(['auth']);
Route::get('/dashboard/pagaments/activate/{id}',[PagamentsController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/pagaments/desactivate/{id}',[PagamentsController::class,'desactivate'])->middleware(['auth']);
Route::get('/dashboard/pagaments/delete/{id}',[PagamentsController::class,'delete'])->middleware(['auth']);
Route::get('/dashboard/pagaments/exportExel',[PagamentsController::class,'exportExel'])->middleware(['auth']);
Route::get('/dashboard/pagaments/exportPdf',[PagamentsController::class,'exportPdf'])->middleware(['auth']);

// CURSOS
Route::get('/dashboard/cursos',[CursosController::class,'index'])->middleware(['auth']);
Route::post('/dashboard/cursos/add',[CursosController::class,'add'])->middleware(['auth']);
Route::post('/dashboard/cursos/edit/{id}',[CursosController::class,'edit'])->middleware(['auth']);
Route::get('/dashboard/cursos/activate/{id}',[cursosController::class,'activate'])->middleware(['auth']);
Route::get('/dashboard/cursos/desactivate/{id}',[cursosController::class,'desactivate'])->middleware(['auth']);
Route::get('/dashboard/cursos/delete/{id}',[cursosController::class,'delete'])->middleware(['auth']);
Route::get('/dashboard/cursos/exportExel',[cursosController::class,'exportExel'])->middleware(['auth']);
Route::get('/dashboard/cursos/exportPdf',[cursosController::class,'exportPdf'])->middleware(['auth']);

// USUARIS
Route::get('/dashboard/usuaris',[UsuarisController::class,'index'])->middleware(['auth'])->middleware(['roluser']);
Route::post('/dashboard/usuaris/add',[UsuarisController::class,'add'])->middleware(['auth'])->middleware(['roluser']);
Route::post('/dashboard/usuaris/edit/{id}',[UsuarisController::class,'edit'])->middleware(['auth'])->middleware(['roluser']);
Route::get('/dashboard/usuaris/activate/{id}',[UsuarisController::class,'activate'])->middleware(['auth'])->middleware(['roluser']);
Route::get('/dashboard/usuaris/desactivate/{id}',[UsuarisController::class,'desactivate'])->middleware(['auth'])->middleware(['roluser']);
Route::get('/dashboard/usuaris/rolSudo/{id}',[UsuarisController::class,'rolSudo'])->middleware(['auth'])->middleware(['roluser']);
Route::get('/dashboard/usuaris/rolNoSudo/{id}',[UsuarisController::class,'rolNoSudo'])->middleware(['auth'])->middleware(['roluser']);
Route::get('/dashboard/usuaris/delete/{id}',[UsuarisController::class,'delete'])->middleware(['auth'])->middleware(['roluser']);

// Personas pago
Route::get('/dashboard/personaspago',[PersonasPagoController::class,'index'])->middleware(['auth']);
Route::get('/dashboard/personapago/delete/{id}',[PersonasPagoController::class,'delete'])->middleware(['auth']);


// Denegacion /dashboard/usuaris
Route::get('/errorRolUser', ['as' => 'errorRolUser', function() {
    return view('Error.error404');
}]);

// HOME
Route::get('/dashboard',[HomeDashboardController::class,'index'])->middleware(['auth']);


require __DIR__.'/auth.php';

// Socialite
Route::get('google', [SocialiteController::class, 'googleRedirect'])->name('auth/google');
Route::get('/auth/google-callback', [SocialiteController::class, 'loginWithGoogle']);

Route::get('/reload-captcha', [AuthenticatedSessionController::class, 'reloadCaptcha']);


