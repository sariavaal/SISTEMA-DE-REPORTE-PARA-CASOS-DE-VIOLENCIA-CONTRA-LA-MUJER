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
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('acussations', App\Http\Controllers\AcussationController::class)->middleware('auth');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

