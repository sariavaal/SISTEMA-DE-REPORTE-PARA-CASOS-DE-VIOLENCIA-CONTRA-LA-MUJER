<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
//recuperar contraseña rutas
//Route::post('password/email', 'Auth\ResetPasswordController@reset')->name('password.email');
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//Route::get('password/reset/{token} ', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');
 
Route::post('/password/email', function (Request $request) {
    $request->validate(['user_email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('user_email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['user_email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');
//rutas hacia los controladores de user y denuncia

Route::post('/password/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'user_email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('user_email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['user_email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_usuario_logeado');

//rutas publicas
Route::get('/urgente', [App\Http\Controllers\PublicRoutesController::class, 'urgente'])->name('urgente');
Route::post('/urgente', [App\Http\Controllers\PublicRoutesController::class,'store'])->name('envio');
Route::get('/seguimiento/{id}', [App\Http\Controllers\PublicRoutesController::class,'seguimiento'])->name('seguimiento');
//Route::post('/auth', [App\Http\Controllers\ForgotPasswordController::class,'sendResetLinkEmail'])->name('reset');
Route::get('/seguimiento_urgent/{id}', [App\Http\Controllers\PublicRoutesController::class,'notificacionParaDenuncianteUrgente'])->name('urgent.seguimiento');




Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
    Route::resource('acussations', App\Http\Controllers\AcussationController::class)->middleware('auth');
    Route::get('/urgentacussation', [App\Http\Controllers\PublicRoutesController::class, 'denuncias'])->name('denuncia')->middleware('auth');
    Route::get('/urgentemostrar/{id}', [App\Http\Controllers\PublicRoutesController::class, 'show'])->name('urgenteshow')->middleware('auth');
    Route::get('/urgentemostrar/{id}/inprogress', [App\Http\Controllers\PublicRoutesController::class, 'showInprogress'])->name('urgenteshow.inprogress')->middleware('auth');
    Route::get('/exist_urgent_acussation', [App\Http\Controllers\PublicRoutesController::class, 'checkUrgents'])->name('check.urgent')->middleware('auth');   
    
    Route::delete('/urgente', [App\Http\Controllers\PublicRoutesController::class,'destroy'])->name('urgente.destroy');
    Route::get('/urgente/{id}', [App\Http\Controllers\PublicRoutesController::class,'edit'])->name('urgente.edit');
    Route::patch('/urgente/{urgente}', [App\Http\Controllers\PublicRoutesController::class,'update'])->name('urgente.update');
    
});

Route::group(['middleware' => ['role:usuario_logueado']], function () {
    Route::post('/acussations', [App\Http\Controllers\AcussationController::class, 'store'])->name('acussations.store');
    Route::get('/my_acussations', [App\Http\Controllers\AcussationController::class, 'my'])->name('acussations.my');
});
