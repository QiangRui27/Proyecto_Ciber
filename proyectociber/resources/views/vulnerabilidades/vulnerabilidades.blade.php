@extends('layouts.master')

@section('title', 'Lista de Vulnerabilidades')

@section('content')
<div class="container mt-4">
    <!-- Título centrado -->
    <h1 class="text-center mb-3">Lista de Vulnerabilidades</h1>

    <!-- Buscador centrado -->
    <div class="d-flex justify-content-center mb-3">
        <form action="{{ route('vulnerabilidades.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="cve" class="form-control me-2" placeholder="Buscar por CVE..." value="{{ request('cve') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <!-- Botón agregar alineado a la derecha -->
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
            Agregar Vulnerabilidad
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('vulnerabilidades.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Agregar Vulnerabilidad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cve_id" class="form-label">CVE</label>
                                <input type="text" class="form-control" id="cve_id" name="cve_id" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre_vulnerabilidad" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_vulnerabilidad" name="nombre_vulnerabilidad" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="criticidad" class="form-label">Severidad</label>
                                <select class="form-select" id="criticidad" name="criticidad">
                                    <option value="desconocido">Seleccione la severidad</option>
                                    <option value="Baja">Baja</option>
                                    <option value="Media">Media</option>
                                    <option value="Alta">Alta</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="cvssp" class="form-label">CVSSP</label>
                                <input type="text" class="form-control" id="CVSSP" name="CVSSP">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="referencias" class="form-label">Referencias</label>
                            <textarea class="form-control" id="referencias" name="referencias" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="solucion" class="form-label">Solución</label>
                            <textarea class="form-control" id="solucion" name="solucion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Vulnerabilidad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabla de vulnerabilidades -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>CVE</th>
                <th>Descripción</th>
                <th>Severidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vulnerabilidadList as $vulnerabilidad)
                <tr>
                    <td>{{ $vulnerabilidad->cve_id }}</td>
                    <td>{{ $vulnerabilidad->descripcion }}</td>
                    <td>{{ $vulnerabilidad->criticidad }}</td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center gap-1">
                            <a href="{{ route('vulnerabilidades.show', $vulnerabilidad->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('vulnerabilidades.edit', $vulnerabilidad->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('vulnerabilidades.destroy', $vulnerabilidad->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $vulnerabilidadList->links() }}
    </div>
</div>
@endsection
