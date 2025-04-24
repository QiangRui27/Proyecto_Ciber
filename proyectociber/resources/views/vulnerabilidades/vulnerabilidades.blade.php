
@extends('layouts.master')

@section('title', 'Lista de Vulnerabilidades')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Vulnerabilidades</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>CVE</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Severidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vulnerabilidadList as $vulnerabilidad)
            <tr>
                <td>{{$vulnerabilidad->cve_id}}</td>
                <td>{{$vulnerabilidad->nombre_vulnerabilidad}}</td>
                <td>{{$vulnerabilidad->descripcion}}</td>
                <td>{{$vulnerabilidad->criticidad}}</td>
                <td>
                    <a href="{{ route('vulnerabilidades.show', $vulnerabilidad->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('vulnerabilidades.edit', $vulnerabilidad->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vulnerabilidades.destroy', $vulnerabilidad->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection