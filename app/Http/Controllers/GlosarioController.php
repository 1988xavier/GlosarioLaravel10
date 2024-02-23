<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concepto;

class GlosarioController extends Controller
{
    public function index()
    {
        // Obtener todos los conceptos de la base de datos
        $conceptos = Concepto::all();

        // Pasar los conceptos a la vista index
        return view('index', compact('conceptos'));
        
    }

    public function editar()
    {
        // Obtener todos los conceptos de la base de datos
        $conceptos = Concepto::all();

        // Pasar los conceptos a la vista de edición
        return view('editar', compact('conceptos'));
    }

    public function editarConcepto($id)
    {
        // Obtener el concepto específico que se va a editar
    $concepto = Concepto::findOrFail($id);
    
    // Pasar el concepto a la vista de edición
    return view('editar', compact('concepto'));
    }


    public function guardarCambios(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'id' => 'required|exists:conceptos,id',
        'concepto' => 'required|string|max:255',
        'definicion' => 'required|text|max:1000',
    ]);

    // Obtén el ID y los datos actualizados del concepto
    $id = $request->input('id');
    $concepto = Concepto::findOrFail($id);
    $concepto->termino = $request->input('concepto');
    $concepto->definicion = $request->input('definicion');
    
    // Guarda los cambios en la base de datos
    $concepto->save();

    // Redirige de vuelta a la página de edición con un mensaje de éxito
    return redirect()->route('editar')->with('success', '¡Concepto actualizado correctamente!');
}

function eliminarConcepto($id) {
     // Eliminamos el termino
     $concepto = concepto::find($id); // 
     $concepto->delete(); // Elimina
     return view('glosario.mensaje', ['msg' => 'Termino eliminado correctamente']);

     //return redirect('glosario');

}

}

