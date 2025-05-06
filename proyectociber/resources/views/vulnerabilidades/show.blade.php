@extends('layouts.master')

@section('title', 'Detalle de Vulnerabilidad')

@section('content')
<div class="container mt-4">
    <h1>Detalle de Vulnerabilidad</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vulnerabilidad->nombre_vulnerabilidad }}</h5>

            <p class="card-text"><strong>CVE:</strong> {{ $vulnerabilidad->cve_id }}</p>

            <p class="card-text"><strong>Descripción:</strong><br>
                {{ $vulnerabilidad->descripcion }}
            </p>

            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Severidad:</strong> {{ $vulnerabilidad->criticidad }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>CVSSP:</strong> {{ $vulnerabilidad->CVSSP ?? 'No especificado' }}</p>
                </div>
            </div>

            <p class="card-text"><strong>Referencias:</strong><br>
                {{ $vulnerabilidad->referencias ?? 'No especificadas' }}
            </p>
            <p class="card-text"><strong>Solución:</strong><br>
                {{ $vulnerabilidad->solucion ?? 'No especificada' }}
            </p>   

            <a href="{{ route('vulnerabilidades.edit', $vulnerabilidad->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('vulnerabilidades.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
