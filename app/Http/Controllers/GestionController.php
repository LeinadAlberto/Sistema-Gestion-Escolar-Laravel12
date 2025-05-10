<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function index()
    {
        $gestiones = Gestion::all();

        return view('admin.gestiones.index', compact('gestiones'));
    }

    public function create()
    {
        return view('admin.gestiones.create');
    }

    public function store(Request $request)
    {
        /* $datos = request()->all();

        return response()->json($datos); */

        $request->validate([
            'nombre' => 'required|numeric|digits:4|unique:gestions'
        ]);

        $gestion = new Gestion();

        $gestion->nombre = $request->nombre;

        $gestion->save();

        return redirect()->route('admin.gestion.index')
                ->with('mensaje', 'La gestión se ha creado correctamente')
                ->with('icono', 'success');
    }

    public function edit($id)
    {
        $gestion = Gestion::find($id);

        return view('admin.gestiones.edit', compact('gestion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|numeric|digits:4|unique:gestions,nombre,' . $id
        ]);

        $gestion = Gestion::find($id);

        $gestion->nombre = $request->nombre;

        $gestion->save();

        return redirect()->route('admin.gestion.index')
                ->with('mensaje', 'La gestión se modifico correctamente')
                ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $gestion = Gestion::find($id);

        $gestion->delete();

        return redirect()->route('admin.gestion.index')
                ->with('mensaje', 'La gestión se elimino correctamente')
                ->with('icono', 'success');
    }
}
