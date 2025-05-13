<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::all();

        return view('admin.niveles.index', compact('niveles'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        /* $datos = request()->all();

        return response()->json($datos); */

        $request->validate([
            'nombre' => 'required|max:100|unique:nivels'
        ]);

        $nivel = new Nivel();

        $nivel->nombre = $request->nombre;

        $nivel->save();

        return redirect()->route('admin.nivel.index')
                ->with('mensaje', 'El nivel se ha creado correctamente')
                ->with('icono', 'success');
    }

    public function show(Nivel $nivel)
    {
        
    }

    public function edit(Nivel $nivel)
    {
        
    }

    public function update(Request $request, $id)
    {
        $validate = 

        $request->validate([
            'nombre' => 'required|max:255|unique:nivels,nombre,' . $id
        ]);

        $nivel = Nivel::find($id);

        $nivel->nombre = $request->nombre;

        $nivel->save();

        return redirect()->route('admin.nivel.index')
                ->with('mensaje', 'El nivel se modifico correctamente')
                ->with('icono', 'success');
    }

    public function destroy(Nivel $nivel)
    {
        //
    }
}
