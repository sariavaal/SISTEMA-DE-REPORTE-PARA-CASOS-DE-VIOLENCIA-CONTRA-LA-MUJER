<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Acussation;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $acussation = new Acussation();
        $user = User::pluck('user_name','id');
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.index');
        } else {
            return view('acussation.create', compact('acussation','user'));
        }
        //return view('home');
    }
}
