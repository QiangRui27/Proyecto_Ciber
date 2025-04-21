<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VulneravilidadesController extends Controller
{
    public function index()
    {
        $vulneravilidadesList = Vulneravilidades::all();
        return view('vulneravilidades/vulneravilidades', ['vulneravilidadesList'=>$vulneravilidadesList]);
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de vulnerabilidades
        return view('vulnerabilidades.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar una nueva vulnerabilidad
        // Validar y guardar los datos en la base de datos
        return redirect()->route('vulnerabilidades.index');
    }

    public function show($id)
    {
        // Lógica para mostrar una vulnerabilidad específica
        return view('vulnerabilidades.show', compact('id'));
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de una vulnerabilidad
        return view('vulnerabilidades.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar una vulnerabilidad existente
        return redirect()->route('vulnerabilidades.index');
    }

    public function destroy($id)
    {
        // Lógica para eliminar una vulnerabilidad
        return redirect()->route('vulnerabilidades.index');
    }
}
