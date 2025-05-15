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

    public function store(Request $request)
    {
        /* $datos = request()->all();

        return response()->json($datos); */

        $request->validate([
            'nombre_create' => 'required|max:100|unique:nivels,nombre'
        ]);

        $nivel = new Nivel();

        $nivel->nombre = $request->nombre_create;

        $nivel->save();

        return redirect()->route('admin.nivel.index')
                ->with('mensaje', 'El nivel se ha creado correctamente')
                ->with('icono', 'success');
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:nivels,nombre,' . $id
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id',$id);
        }

        $nivel = Nivel::find($id);

        $nivel->nombre = $request->nombre;

        $nivel->save();

        return redirect()->route('admin.nivel.index')
                ->with('mensaje', 'El nivel se modifico correctamente')
                ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $nivel = Nivel::find($id);

        $nivel->delete();

        return redirect()->route('admin.nivel.index')
                ->with('mensaje', 'El nivel se elimino correctamente')
                ->with('icono', 'success');
    }
}
