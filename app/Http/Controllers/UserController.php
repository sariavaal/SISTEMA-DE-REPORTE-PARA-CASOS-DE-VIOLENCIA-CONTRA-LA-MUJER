<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Acussation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }
        $users = User::paginate();
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }       
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->id !== $id && !Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function my_user()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function editar_my()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);
        $parametros = $request->all();
        $parametros["password"] = Hash::make($request->password);
        $user->update($parametros);
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('users.index')
            ->with('success', 'Datos actualizados con éxito');
        } else {
            return redirect()->route('users_my')
            ->with('success', 'Datos actualizados con éxito');
        }

    }

   

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.my');
        }
        $user = User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado con éxito');
    }
}
