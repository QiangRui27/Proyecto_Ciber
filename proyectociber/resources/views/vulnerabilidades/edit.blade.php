@extends('layouts.master')

@section('title', 'Editar Vulnerabilidad')

@section('content')
<div class="container mt-4">
    <h1>Editar Vulnerabilidad</h1>
    <form action="{{ route('vulnerabilidades.update', $vulnerabilidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cve_id" class="form-label">CVE</label>
                <input type="text" class="form-control" id="cve_id" name="cve_id" value="{{ $vulnerabilidad->cve_id }}" required>
            </div>
            <div class="col-md-6">
                <label for="nombre_vulnerabilidad" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_vulnerabilidad" name="nombre_vulnerabilidad" value="{{ $vulnerabilidad->nombre_vulnerabilidad }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $vulnerabilidad->descripcion }}</textarea>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="criticidad" class="form-label">Severidad</label>
                <select class="form-select" id="criticidad" name="criticidad">
                    <option value="" disabled>Seleccione la severidad</option>
                    <option value="Baja" {{ $vulnerabilidad->criticidad == 'Baja' ? 'selected' : '' }}>Baja</option>
                    <option value="Media" {{ $vulnerabilidad->criticidad == 'Media' ? 'selected' : '' }}>Media</option>
                    <option value="Alta" {{ $vulnerabilidad->criticidad == 'Alta' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="cvssp" class="form-label">CVSSP</label>
                <input type="text" class="form-control" id="CVSSP" name="CVSSP" value="{{ $vulnerabilidad->CVSSP }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="referencias" class="form-label">Referencias</label>
            <textarea class="form-control" id="referencias" name="referencias" rows="3">{{ $vulnerabilidad->referencias }}</textarea>
        </div>
        <div class="mb-3">
            <label for="solucion" class="form-label">Solución</label>
            <textarea class="form-control" id="solucion" name="solucion" rows="3">{{ $vulnerabilidad->solucion }}</textarea>
        </div>    
        <button type="submit" class="btn btn-primary">Actualizar Vulnerabilidad</button>
        <a href="{{ route('vulnerabilidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
