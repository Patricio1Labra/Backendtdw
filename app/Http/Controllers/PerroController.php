<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use Illuminate\Http\Request;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::all();
        return view('perros.index', compact('perros'));
    }

    public function create()
    {
        return view('perros.create');
    }

    public function store(Request $request)
    {
        $perro = new Perro();
        $perro->nombre = $request->input('nombre');
        $perro->url_foto = $request->input('url_foto');
        $perro->descripcion = $request->input('descripcion');
        $perro->save();

        return redirect()->route('perros.index');
    }

    public function show(Perro $perro)
    {
        return view('perros.show', compact('perro'));
    }

    public function edit(Perro $perro)
    {
        return view('perros.edit', compact('perro'));
    }

    public function update(Request $request, Perro $perro)
    {
        $perro->nombre = $request->input('nombre');
        $perro->url_foto = $request->input('url_foto');
        $perro->descripcion = $request->input('descripcion');
        $perro->save();

        return redirect()->route('perros.index');
    }

    public function destroy(Perro $perro)
    {
        $perro->delete();

        return redirect()->route('perros.index');
    }
}
