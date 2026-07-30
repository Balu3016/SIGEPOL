@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        


        <div class="card-header bg-dark text-white d-flex justify-content-between">

            <h5 class="mb-0">
                📄 Detalle del Reporte {{ $reporte->folio }}
            </h5>

            <a href="/reportes"
               class="btn btn-light btn-sm">

                ← Regresar

            </a>

        </div>

        <div class="card-body">

            <p><strong>Fecha:</strong> {{ $reporte->fecha }}</p>
            <p><strong>Auxilio:</strong> {{ $reporte->auxilio }}</p>
            <p><strong>CRP:</strong> {{ $reporte->crp ?? 'N/A' }}</p>
            <p><strong>Medio:</strong> {{ $reporte->medio_reporte }}</p>

            <hr>

            <p><strong>Hora Reporte:</strong> {{ $reporte->hora_reporte }}</p>
            <p><strong>Hora Término:</strong> {{ $reporte->hora_termino }}</p>

            <hr>

            <p><strong>Sector:</strong> {{ $reporte->sector }}</p>
            <p><strong>Calle:</strong> {{ $reporte->calle }}</p>
            <p><strong>Coordenadas:</strong> {{ $reporte->coordenadas }}</p>

            <hr>

            <p><strong>Responsable:</strong> {{ $reporte->responsable }}</p>
            <p><strong>Escolta:</strong> {{ $reporte->escolta ?? 'N/A' }}</p>

            <hr>

            <p><strong>Víctima:</strong> {{ $reporte->victima ?? 'N/A' }}</p>
            <p><strong>Victimario:</strong> {{ $reporte->victimario ?? 'N/A' }}</p>

            <hr>

            <p>
                <strong>Resultado:</strong>
                @if($reporte->positivo == 'POSITIVO')
                    <span class="badge bg-success">POSITIVO</span>
                @else
                    <span class="badge bg-danger">NEGATIVO</span>
                @endif
            </p>

            <hr>

            <p><strong>Resolución:</strong></p>
            <p>{{ $reporte->resolucion }}</p>

        </div>

        <div class="card-footer text-end">

    <a href="/reportes/{{ $reporte->id }}/edit"
       class="btn btn-warning">

        ✏ Editar

    </a>

</div>
    </div>

</div>

@endsection