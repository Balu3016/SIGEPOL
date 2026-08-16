@extends('layouts.app')

@section('content')

{{-- CDN FontAwesome & DataTables JS/CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="container-fluid px-4 py-3">

    {{-- Notificación Flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Encabezado con estadísticas rápidas --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold text-dark m-0">
                <i class="fa-solid fa-shield-halved text-primary me-2"></i>Registro de Detenidos (IPH)
            </h3>
            <p class="text-muted small mb-0">Gestión y consulta de puestas a disposición</p>
        </div>
        <a href="{{ route('detenidos.create') }}" class="btn btn-primary px-4 shadow-sm fw-semibold">
            <i class="fa-solid fa-plus-circle me-2"></i>Nuevo Detenido
        </a>
    </div>

    {{-- Tarjeta Principal --}}
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-dark text-white py-3 d-flex align-items-center justify-content-between">
            <span class="fw-bold"><i class="fa-solid fa-list-check me-2"></i>Listado Oficial de Puestas</span>
            <span class="badge bg-primary px-3 py-2">Total: {{ $detenidos->count() }}</span>
        </div>

        <div class="card-body p-3">
            <div class="table-responsive">
                <table id="tabla-detenidos" class="table table-hover align-middle w-100 fs-7" style="font-size: 0.875rem;">
                    <thead class="table-dark text-nowrap">
                        <tr>
                            <th class="text-center">No. Puesta</th>
                            <th>Fecha / Hora</th>
                            <th>Folio IPH</th>
                            <th>RND</th>
                            <th>Detenido</th>
                            <th>Edad / Sexo</th>
                            <th>Lugar Detención</th>
                            <th>Primer Respondiente</th>
                            <th>Vehículo</th>
                            <th>Sanción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($detenidos as $d)
                        <tr>
                            <td class="text-center fw-bold text-secondary">#{{ $d->numero_puesta }}</td>
                            <td class="text-nowrap">
                                <div><i class="fa-regular fa-calendar me-1 text-muted"></i>{{ $d->fecha }}</div>
                                <div class="text-muted small"><i class="fa-regular fa-clock me-1"></i>{{ $d->hora_puesta }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border fw-semibold">{{ $d->folio_iph ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark fw-bold">{{ $d->rnd ?? 'SIN RND' }}</span>
                            </td>
                            <td class="fw-bold text-uppercase">
                                {{ $d->detenido }}
                                <div class="text-muted fw-normal" style="font-size: 0.75rem;">
                                    <i class="fa-solid fa-location-dot me-1"></i>{{ Str::limit($d->domicilio_detenido, 25) }}
                                </div>
                            </td>
                            <td class="text-nowrap">
                                <span class="badge bg-secondary">{{ $d->edad }} años</span>
                                <span class="badge {{ strtolower($d->sexo) == 'm' || strtolower($d->sexo) == 'masculino' ? 'bg-primary' : 'bg-danger' }}">
                                    {{ strtoupper($d->sexo) }}
                                </span>
                            </td>
                            <td>{{ Str::limit($d->lugar_detencion, 30) }}</td>
                            <td><small class="fw-semibold">{{ $d->primer_respondiente }}</small></td>
                            <td>
                                @if($d->vehiculo)
                                    <span class="badge bg-light text-secondary border"><i class="fa-solid fa-car me-1"></i>{{ $d->vehiculo }}</span>
                                @else
                                    <span class="text-muted small">N/A</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $d->sancion ?? 'En proceso' }}</span>
                            </td>
                            <td class="text-center text-nowrap">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('detenidos.show', $d->id) }}" class="btn btn-outline-info" title="Ver Expediente">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('detenidos.edit', $d->id) }}" class="btn btn-outline-warning" title="Editar Registro">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" onclick="eliminarDetenido('{{ $d->id }}')" title="Eliminar Registro">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>

                                <form id="form-delete-{{ $d->id }}" action="{{ route('detenidos.destroy', $d->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript Scripts --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#tabla-detenidos').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            },
            responsive: true,
            pageLength: 10,
            order: [[0, 'desc']], // Ordenar por defecto por el No. de Puesta
            columnDefs: [
                { orderable: false, targets: [10] } // Deshabilitar orden en columna acciones
            ]
        });
    });

    function eliminarDetenido(id) {
        SweetAlert.fire({
            title: '¿Confirmar eliminación?',
            text: "Esta acción no se puede deshacer y el registro será borrado permanentemente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-' + id).submit();
            }
        });
    }
</script>

@endsection