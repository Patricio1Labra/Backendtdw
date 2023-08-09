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
        ]);

        // Crea una nueva instancia del modelo Perro con los datos recibidos
        $perro = Perro::create([
            'nombre' => $request->input('nombre'),
            'sexo' => $request->input('sexo'),
            'url_foto' => $request->input('url_foto'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Puedes retornar una respuesta de éxito si lo deseas
        return response()->json(['message' => 'Perro registrado correctamente', 'perro' => $perro], 201);
    }

    public function login(Request $req)
    {
        $user= Perro::where('id',$req->id)->first();
        if(!$user)
            return ["error"=>"Perro no encontrado"];
        return $user;
    }

    public function show($id)
    {
        $perro = Perro::find($id);

        if (!$perro) {
            return ["error"=>"Perro no encontrado"];
        }

        return ($perro);
    }

    public function index($excludeId)
    {
        $perros = Perro::where('id', '!=', $excludeId)->get();
        return $perros;
    }
}