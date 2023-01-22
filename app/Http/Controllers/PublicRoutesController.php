<?php

namespace App\Http\Controllers;

use App\Models\Urgente;

use Illuminate\Http\Request;

class PublicRoutesController extends Controller
{

    public function urgente() 
    {
        $urgente = new Urgente();
        return view('public.urgente', compact('urgente'));
       // return view('public.urgente');
    }


    public function store(Request $request)
    {
        request()->validate(Urgente::$rules);

        $urgente = Urgente::create($request->all());

        return redirect()->route('urgente')
            ->with('status', 'Denuncia enviada con éxito.');
    }

    public function denuncias(){

        $denuncias = Urgente::paginate();

        return view('public.denuncia', compact('denuncias'))
            ->with('i', (request()->input('page', 1) - 1) * $denuncias->perPage());

    }
}

