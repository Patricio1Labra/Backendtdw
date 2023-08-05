<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;

class PerroController extends Controller
{
    public function store(Request $request)
    {
        // Valida los datos recibidos desde la API (opcional)
        $request->validate([
            'nombre' => 'required|string',
            'sexo' => 'required',
            'descripcion' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Crea una nueva instancia del modelo Perro con los datos recibidos
        $perro = Perro::create([
            'nombre' => $request->input('nombre'),
            'sexo' => $request->input('sexo'),
            'url_foto' => $request->input('url_foto'),
            'descripcion' => $request->input('descripcion'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Puedes retornar una respuesta de éxito si lo deseas
        return response()->json(['message' => 'Perro registrado correctamente', 'perro' => $perro], 201);
    }
}
