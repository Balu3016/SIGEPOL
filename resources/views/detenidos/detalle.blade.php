@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white d-flex justify-content-between">

            <h5 class="mb-0">
                👁 Información del Detenido
            </h5>

            <a href="/detenidos"
               class="btn btn-light btn-sm">

                ← Regresar

            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <strong>Número de Puesta:</strong><br>
                    {{ $detenido->numero_puesta }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Fecha:</strong><br>
                    {{ $detenido->fecha }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Folio IPH:</strong><br>
                    {{ $detenido->folio_iph }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Hora de Puesta:</strong><br>
                    {{ $detenido->hora_puesta }}
                </div>

                <div class="col-md-8 mb-3">
                    <strong>Primer Respondiente:</strong><br>
                    {{ $detenido->primer_respondiente }}
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Lugar de Detención:</strong><br>
                    {{ $detenido->lugar_detencion }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Nombre del Detenido:</strong><br>
                    {{ $detenido->detenido }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>RND:</strong><br>
                    {{ $detenido->rnd }}
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Domicilio:</strong><br>
                    {{ $detenido->domicilio_detenido }}
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Edad:</strong><br>
                    {{ $detenido->edad }}
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Sexo:</strong><br>
                    {{ $detenido->sexo }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Vehículo:</strong><br>
                    {{ $detenido->vehiculo }}
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Sanción / Motivo:</strong><br>

                    <div class="border rounded p-3 bg-light">

                        {{ $detenido->sancion }}

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="/detenidos/{{ $detenido->id }}/edit"
               class="btn btn-warning">

                ✏ Editar

            </a>

            <a href="/detenidos"
               class="btn btn-secondary">

                Volver

            </a>

        </div>

    </div>

</div>

@endsection