<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $req)
    {
        $user= Perro::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password))
            return ["error"=>"Email or password is not matched"];
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['token' => $token, 'user' => $user]);
            //return $user;
    }

    public function login1(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('perro')->attempt($credentials)) {
            $perro = Auth::guard('perro')->user();
            $token = $perro->createToken('authToken')->accessToken;
    
            return response()->json(['token' => $token, 'perro' => $perro]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

}
