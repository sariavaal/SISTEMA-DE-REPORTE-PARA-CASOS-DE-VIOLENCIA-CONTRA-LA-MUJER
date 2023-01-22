<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


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








Auth::routes();

//rutas hacia los controladores de user y denuncia


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_usuario_logeado');

//rutas publicas
Route::get('/urgente', [App\Http\Controllers\PublicRoutesController::class, 'urgente'])->name('urgente');
Route::post('/urgente', [App\Http\Controllers\PublicRoutesController::class,'store'])->name('envio');




Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
    Route::resource('acussations', App\Http\Controllers\AcussationController::class)->middleware('auth');
    Route::get('/urgentacussation', [App\Http\Controllers\PublicRoutesController::class, 'denuncias'])->name('denuncia')->middleware('auth');

   

});

Route::group(['middleware' => ['role:usuario_logueado']], function () {
    Route::post('/acussations', [App\Http\Controllers\AcussationController::class, 'store'])->name('acussations.store');
    Route::get('/my_acussations', [App\Http\Controllers\AcussationController::class, 'my'])->name('acussations.my');
});
