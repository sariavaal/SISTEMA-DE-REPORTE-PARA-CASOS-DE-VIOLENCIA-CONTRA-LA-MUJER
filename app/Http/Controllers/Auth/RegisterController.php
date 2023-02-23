<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return  Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255', 'alpha:ascii'],
            'user_surname' => ['required', 'string', 'max:255','alpha:ascii'],
            'user_ci' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_number' => ['required', 'string'],
            'user_date_of_birth' => ['required', 'date','before:31/12/2022'],
            'user_gender' => ['required', 'string', 'max:255']
        ]);
       /* if ($validator->fails()) {
            var_dump($_POST); echo "</br>";
            var_dump( $validator->errors());die;
        }*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'user_name' => $data['user_name'],
            'user_surname' => $data['user_surname'],
            'user_ci' => $data['user_ci'],
            'user_email' => $data['user_email'],
            'password' => Hash::make($data['password']),
            'user_number' => $data['user_number'],
            'user_date_of_birth' => $data['user_date_of_birth'],
            'user_gender' => $data['user_gender'],
        ]);
        $user->assignRole('usuario_logueado'); 
        return $user;
    }
}
