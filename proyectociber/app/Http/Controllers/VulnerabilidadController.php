<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vulnerabilidad;

class vulnerabilidadController extends Controller
{
    public function index()
    {
        $vulnerabilidadList = Vulnerabilidad::paginate(12);
        return view('vulnerabilidades/vulnerabilidades', compact('vulnerabilidadList'));
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de vulnerabilidad
        return view('vulnerabilidad.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar una nueva vulnerabilidad
        $v = new vulnerabilidad();
        $v->cve_id = $request->input('cve_id');
        $v->nombre_vulnerabilidad = $request->input('nombre_vulnerabilidad');
        $v->descripcion = $request->input('descripcion');
        $v->CVSSP = $request->input('CVSSP');
        $v->criticidad = $request->input('criticidad');
        $v->solucion = $request->input('solucion');
        $v->referencias = $request->input('referencias');
        $v->save();
        // Validar y guardar los datos en la base de datos
        return redirect()->route('vulnerabilidades.index');
    }

    public function show($id)
    {
        // Lógica para mostrar una vulnerabilidad específica
        $v = vulnerabilidad::find($id);
        $data['vulnerabilidad'] = $v;
        return view('vulnerabilidades.show', $data);
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de una vulnerabilidad
        $vulnerabilidad = vulnerabilidad::find($id);
        return view('vulnerabilidades.edit', compact('vulnerabilidad'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar una vulnerabilidad existente
        $v = vulnerabilidad::find($id);
        $v->cve_id = $request->input('cve_id');
        $v->nombre_vulnerabilidad = $request->input('nombre_vulnerabilidad');
        $v->descripcion = $request->input('descripcion');
        $v->CVSSP = $request->input('CVSSP');
        $v->criticidad = $request->input('criticidad');
        $v->solucion = $request->input('solucion');
        $v->referencias = $request->input('referencias');
        $v->save();
        // Validar y guardar los datos en la base de datos
        return redirect()->route('vulnerabilidades.index');
    }

    public function destroy($id)
    {
        // Lógica para eliminar una vulnerabilidad
        $v = vulnerabilidad::find($id);
        $v->delete();
        return redirect()->route('vulnerabilidades.index')->with('delete', 'ok');
    }
}
