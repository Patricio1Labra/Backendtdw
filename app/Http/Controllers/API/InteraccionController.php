<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Interaccion;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{
    public function index(Request $request, $perroInteresado)
    {
        // Obtener las interacciones del perro interesado
        $interacciones = Interaccion::where('perro_interesado_id', $perroInteresado)->get();

        // Separar las interacciones por aceptados y rechazados
        $aceptados = $interacciones->where('preferencia', 'aceptado');
        $rechazados = $interacciones->where('preferencia', 'rechazado');

        return response()->json([
            'aceptados' => $aceptados,
            'rechazados' => $rechazados,
        ], 200);
    }
}
