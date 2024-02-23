<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concepto;

class NuevoController extends Controller
{
    public function index()
    {
        return view('nuevo');
    }

    public function guardarConcepto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'concepto' => 'required',
            'definicion' => 'required',
        ]);

        // Crear un nuevo concepto con los datos del formulario
        $concepto = new Concepto();
        $concepto->termino = $request->input('concepto');
        $concepto->definicion = $request->input('definicion');
        $concepto->save();

        // Redirigir de vuelta al formulario de nuevo concepto con un mensaje de éxito
        return redirect()->route('nuevo')->with('success', '¡Concepto guardado correctamente!');
    }
}

