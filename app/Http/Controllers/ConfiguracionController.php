<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');

        $divisas = json_decode($jsonData, true);

        $configuracion = Configuracion::first();

        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }

    public function store(Request $request)
    {
        /* $datos = request()->all();

        return response()->json($datos); */

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg'
        ]);

        $configuracion = Configuracion::first();

        if ($configuracion) {
            // Actualizar
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                // Eliminar el logo anterior
                if ($configuracion->logo) {
                    unlink(public_path($configuracion->logo));
                }
                // Nuevo Logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }

            $configuracion->save();
    
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración actualizada correctamente')
                ->with('icono', 'success');
        } else {
            // Crear nueva configuración
            $configuracion = new Configuracion();
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                // Nuevo Logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }

            $configuracion->save();
    
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración creada correctamente')
                ->with('icono', 'success');
        }

    }

    public function show(Configuracion $configuracion)
    {
        
    }

    public function edit(Configuracion $configuracion)
    {
        
    }

    public function update(Request $request, Configuracion $configuracion)
    {
        
    }

    public function destroy(Configuracion $configuracion)
    {
        
    }
}
