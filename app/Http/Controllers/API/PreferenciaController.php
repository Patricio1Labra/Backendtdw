<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perro;
use App\Models\Interaccion;
use Illuminate\Http\Request;

class PreferenciaController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validar los datos recibidos en la petición
        /*$request->validate([
            'perro_candidato_id' => 'required|exists:perros,id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ]);*/

        // Crear la interacción con las preferencias
        $interaccion = new Interaccion();
        $interaccion->perro_interesado_id = $id;
        $interaccion->perro_candidato_id = $request->input('perro_candidato_id');
        $interaccion->preferencia = $request->input('preferencia');
        $interaccion->save();

        return response()->json(['message' => 'Preferencia guardada correctamente'], 201);
    }
}
