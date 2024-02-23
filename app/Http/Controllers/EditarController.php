<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concepto;

class EditarController extends Controller
{
    public function index()
    {
        // Obtener todos los conceptos de la base de datos
        $conceptos = Concepto::all();
        
        return view('index', ['conceptos' => $conceptos]);
    }

    public function guardarCambios(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nuevo_concepto' => 'required',
            'nueva_definicion' => 'required',
        ]);

        // Actualizar el concepto en la base de datos
        $concepto = Concepto::findOrFail($request->concepto_id);
        $concepto->update([
            'termino' => $request->nuevo_concepto,
            'definicion' => $request->nueva_definicion,
        ]);

        // Redirigir de vuelta a la página de index
        return redirect()->route('index')->with('success', 'Concepto actualizado correctamente');
    }
}
