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

    public function checkUrgents()
    {
        $denunciasUrgentes = Urgente::where('status', '=','pending')->orderBy('id')->first();
        return response()->json($denunciasUrgentes);
    }

    public function store(Request $request)
    {
        request()->validate(Urgente::$rules);

        $urgente = Urgente::create($request->all());

        return redirect()->route('seguimiento', ['id' => $urgente->id])
            ->with('status', 'Denuncia enviada con éxito.');
    }

    public function denuncias(){
        $denuncias = [];
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            switch ($status) {
                case 'pending':
                    $denuncias = Urgente::where('status', '=', 'pending')->paginate();
                    break;
                case 'in process':
                    $denuncias = Urgente::where('status', '=', 'in process')->paginate();
                    break;                
                case 'finished':
                    $denuncias = Urgente::where('status', '=', 'finished')->paginate();
                    break;
                default:
                    $denuncias = Urgente::paginate();
                    break;
            }
        } else {
            $denuncias = Urgente::paginate();
        }

        return view('public.denuncia', compact('denuncias'))
            ->with('i', (request()->input('page', 1) - 1) * $denuncias->perPage());

    }

    public function seguimiento($id) {
        $urgente = Urgente::find($id);
        return view('public.urgenteshowseguimiento', compact('urgente'));
    }

    public function show($id)
    {
        $urgente = Urgente::find($id);

        return view('public.urgenteshow', compact('urgente'));
    }

    public function showInprogress($id)
    {
        $urgente = Urgente::find($id);
        $urgente->status = 'in process';
        $urgente->save();
        return view('public.urgenteshow', compact('urgente'));
    }
    
    public function notificacionParaDenuncianteUrgente($id)
    {
        $urgente = Urgente::find($id);
        if ($urgente->status !== 'pending') {
            return response()->json($urgente);
        }
    }

    public function edit($id) 
    {
        $urgente = Urgente::find($id);

        return view('public.editurgente', compact('urgente'));
    }

    public function update(Request $request, Urgente $urgente)
    {
        request()->validate(Urgente::$rules);
        $urgente->update($request->all());

        return redirect()->route('denuncia')
            ->with('success', 'Denuncia Urgente actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $urgente = Urgente::find($id)->delete();

        return redirect()->route('denuncia')
            ->with('success', 'Denuncia eliminada con exito');
    }
}

