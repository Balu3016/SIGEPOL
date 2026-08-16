@extends('layouts.app')

@section('content')

    @php
        // 🛠️ DATOS "HECHIZO" PARA EL PANEL DE CAPTURA
        $registrosRecientes = [
            [
                'folio' => 'REP-2026-0891',
                'tipo' => 'Reporte Operativo',
                'auxilio' => 'Robo a Transeúnte',
                'hora' => '14:20 hrs',
                'sector' => 'Sector 1 - Centro',
                'estatus' => 'Completado',
                'badge' => 'bg-success'
            ],
            [
                'folio' => 'IPH-2026-0312',
                'tipo' => 'Detención (IPH)',
                'auxilio' => 'Alteración al Orden',
                'hora' => '12:05 hrs',
                'sector' => 'Sector 2 - Norte',
                'estatus' => 'Pendiente RND',
                'badge' => 'bg-warning text-dark'
            ],
            [
                'folio' => 'REP-2026-0888',
                'tipo' => 'Reporte Operativo',
                'auxilio' => 'Accidente Vial',
                'hora' => '09:45 hrs',
                'sector' => 'Sector 3 - Sur',
                'estatus' => 'Completado',
                'badge' => 'bg-success'
            ]
        ];
    @endphp

    <!-- 👮 CABECERA DE OPERADOR / CAPTURISTA -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">
                👮 Módulo de Captura Operativa
            </h3>
            <small class="text-muted">
                Capturista: <strong>{{ Auth::user()->name ?? 'Elemento en Turno' }}</strong> | Dirección de Seguridad Pública
            </small>
        </div>
        <div>
            <span class="badge bg-primary px-3 py-2 fs-6">
                Turno Activo | {{ date('d/m/Y') }}
            </span>
        </div>
    </div>

    <!-- 🚀 ACCIONES RÁPIDAS DE CAPTURA -->
    <div class="row g-3 mb-4">
        <!-- Tarjeta 1: Nuevo Reporte -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm border-start border-primary border-5">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="badge bg-primary-subtle text-primary fw-bold mb-1">Módulo Operativo</span>
                        <h4 class="fw-bold mb-1 text-dark">📋 Registrar Reporte / Servicio</h4>
                        <p class="text-muted mb-0 small">Captura de auxilio, ubicación, datos de unidad y resultado del servicio.</p>
                    </div>
                    <a href="#" class="btn btn-primary btn-lg fw-bold px-4">
                        + Crear
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2: Nueva Puesta / Detenido -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm border-start border-danger border-5">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="badge bg-danger-subtle text-danger fw-bold mb-1">Registro RND / IPH</span>
                        <h4 class="fw-bold mb-1 text-dark">🚔 Capturar Detenido / Puesta</h4>
                        <p class="text-muted mb-0 small">Registro de puesta a disposición, folio RND, datos de detenido y primer respondiente.</p>
                    </div>
                    <a href="#" class="btn btn-danger btn-lg fw-bold px-4">
                        + Registrar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 📋 MIS REGISTROS RECIENTES EN EL TURNO -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
            <div>
                <h6 class="m-0 fw-bold text-dark">📑 Mis Capturas Recientes en el Turno</h6>
                <small class="text-muted">Últimos folios ingresados desde esta cuenta</small>
            </div>
            <button class="btn btn-sm btn-outline-secondary">
                🔄 Actualizar
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Folio</th>
                            <th>Tipo de Registro</th>
                            <th>Motivo / Auxilio</th>
                            <th>Sector</th>
                            <th>Hora Captura</th>
                            <th>Estatus</th>
                            <th class="text-end pe-3">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrosRecientes as $registro)
                            <tr>
                                <td class="ps-3 fw-bold text-primary">{{ $registro['folio'] }}</td>
                                <td>
                                    @if(str_contains($registro['tipo'], 'Detención'))
                                        <span class="badge bg-danger-subtle text-danger fw-bold">{{ $registro['tipo'] }}</span>
                                    @else
                                        <span class="badge bg-info-subtle text-info-emphasis fw-bold">{{ $registro['tipo'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $registro['auxilio'] }}</td>
                                <td>{{ $registro['sector'] }}</td>
                                <td><small class="text-muted">{{ $registro['hora'] }}</small></td>
                                <td>
                                    <span class="badge {{ $registro['badge'] }} px-2 py-1">
                                        {{ $registro['estatus'] }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <button class="btn btn-sm btn-light border">👁️ Ver</button>
                                    <button class="btn btn-sm btn-light border">✏️ Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection