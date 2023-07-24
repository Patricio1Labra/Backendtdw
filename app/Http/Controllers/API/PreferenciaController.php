<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perro;
use App\Models\Interaccion;
use Illuminate\Http\Request;

class PreferenciaController extends Controller
{
    public function store(Request $request, Perro $perro)
    {
        // Validar los datos recibidos en la petición
        $request->validate([
            'perro_candidato_id' => 'required|exists:perros,id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ]);

        // Generar el identificador único
        $identificador = Str::uuid()->toString();

        // Crear la interacción con las preferencias
        $interaccion = new Interaccion();
        $interaccion->perro_interesado_id = $perro->id;
        $interaccion->perro_candidato_id = $request->input('perro_candidato_id');
        $interaccion->preferencia = $request->input('preferencia');
        $interaccion->identificador = $identificador;
        $interaccion->save();

        return response()->json(['message' => 'Preferencia guardada correctamente'], 201);
    }
}
