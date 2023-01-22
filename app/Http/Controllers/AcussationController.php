<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acussation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


/**
 * Class AcussationController
 * @package App\Http\Controllers
 */
class AcussationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acussations = Acussation::paginate();

        return view('acussation.index', compact('acussations'))
            ->with('i', (request()->input('page', 1) - 1) * $acussations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acussation = new Acussation();
        
        $user= User::pluck('user_name','id');
        return view('acussation.create', compact('acussation','user'));
    }
   
    public function my()
    {
        $acussations = Acussation::where('users_id', '=', Auth::user()->id)->paginate();
        return view('acussation.my', compact('acussations'))
            ->with('i', (request()->input('page', 1) - 1) * $acussations->perPage());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Acussation::$rules);
        $parametros = $request->all();
        $parametros['status'] = 'pending';
        $acussation = Acussation::create($parametros);
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('acussations.index');
        } else {
            return redirect()->route('home_usuario_logeado')
            ->with('status', 'Denuncia realizada con exito.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acussation = Acussation::find($id);

        return view('acussation.show', compact('acussation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acussation = Acussation::find($id);

        return view('acussation.edit', compact('acussation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Acussation $acussation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acussation $acussation)
    {
        request()->validate(Acussation::$rules);

        $acussation->update($request->all());

        return redirect()->route('acussations.index')
            ->with('success', 'Acussation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $acussation = Acussation::find($id)->delete();

        return redirect()->route('acussations.index')
            ->with('success', 'Acussation deleted successfully');
    }
}
