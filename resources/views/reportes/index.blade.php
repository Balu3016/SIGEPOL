@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- 🔥 TÍTULO -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            📋 Lista de Reportes
        </h2>

        <a href="/reportes/crear"
           class="btn btn-primary shadow">

            ➕ Nuevo Reporte

        </a>

    </div>

    <!-- 🔥 MENSAJE -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <!-- 🔥 FILTROS -->
    <form method="GET"
          action="/reportes"
          class="row mb-4 g-2">

        <!-- AUXILIO -->
        <div class="col-md-4">

            <select name="auxilio"
                    class="form-select">

                <option value="">
                    Todos los auxilios
                </option>

                @foreach($auxilios as $auxilio)

                    <option value="{{ $auxilio->nombre }}"
                        {{ request('auxilio') == $auxilio->nombre ? 'selected' : '' }}>

                        {{ $auxilio->nombre }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- FECHA -->
        <div class="col-md-3">

            <input type="date"
                   name="fecha"
                   class="form-control"
                   value="{{ request('fecha') }}">

        </div>

        <!-- BOTON -->
        <div class="col-md-2">

            <button class="btn btn-primary w-100">

                🔍 Filtrar

            </button>

        </div>

        <!-- LIMPIAR -->
        <div class="col-md-2">

            <a href="/reportes"
               class="btn btn-secondary w-100">

                ♻ Limpiar

            </a>

        </div>

    </form>

    <!-- 🔥 TABLA -->
    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            📑 Reportes Registrados

        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover table-bordered align-middle text-center">

                <thead class="table-dark">

                    <tr>

                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Auxilio</th>
                        <th>CRP</th>
                        <th>Medio</th>
                        <th>Hr Rep</th>
                        <th>Hr Term</th>
                        <th>Sector</th>
                        <th>Calle</th>
                        <th>Coordenadas</th>
                        <th>Responsable</th>
                        <th>Escolta</th>
                        <th>Víctima</th>
                        <th>Victimario</th>
                        <th>Resultado</th>
                        <th>Resolución</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($reportes as $r)

                    <tr>

                        <!-- FOLIO -->
                        <td>

                            <span class="badge bg-primary">

                                {{ $r->folio }}

                            </span>

                        </td>

                        <!-- FECHA -->
                        <td>{{ $r->fecha }}</td>

                        <!-- AUXILIO -->
                        <td>{{ $r->auxilio }}</td>

                        <!-- CRP -->
                        <td>{{ $r->crp ?? 'N/A' }}</td>

                        <!-- MEDIO -->
                        <td>{{ $r->medio_reporte }}</td>

                        <!-- HORA REPORTE -->
                        <td>{{ $r->hora_reporte }}</td>

                        <!-- HORA TERMINO -->
                        <td>{{ $r->hora_termino }}</td>

                        <!-- SECTOR -->
                        <td>{{ $r->sector }}</td>

                        <!-- CALLE -->
                        <td>{{ $r->calle }}</td>

                        <!-- COORDENADAS -->
                        <td>{{ $r->coordenadas }}</td>

                        <!-- RESPONSABLE -->
                        <td>{{ $r->responsable }}</td>

                        <!-- ESCOLTA -->
                        <td>{{ $r->escolta ?? 'N/A' }}</td>

                        <!-- VICTIMA -->
                        <td>{{ $r->victima ?? 'N/A' }}</td>

                        <!-- VICTIMARIO -->
                        <td>{{ $r->victimario ?? 'N/A' }}</td>

                        <!-- RESULTADO -->
                        <td>

                            @if($r->positivo == 'POSITIVO')

                                <span class="badge bg-success">

                                    POSITIVO

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    NEGATIVO

                                </span>

                            @endif

                        </td>

                        <!-- RESOLUCION -->
                        <td>{{ $r->resolucion }}</td>

                        <!-- ACCIONES -->
                        <td>

                            <!-- VER -->
                            <a href="/reportes/{{ $r->id }}"
                               class="btn btn-info btn-sm mb-1">

                                👁 Ver

                            </a>

                            <!-- EDITAR -->
                            <a href="/reportes/{{ $r->id }}/edit"
                               class="btn btn-warning btn-sm mb-1">

                                ✏ Editar

                            </a>

                            <!-- ELIMINAR -->
                            <form action="/reportes/{{ $r->id }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar reporte?')">

                                    🗑 Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="17"
                            class="text-center">

                            No hay reportes registrados

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- 🔥 PAGINACIÓN -->
    <div class="mt-4 d-flex justify-content-center">

        {{ $reportes->withQueryString()->links() }}

    </div>

</div>

@endsection