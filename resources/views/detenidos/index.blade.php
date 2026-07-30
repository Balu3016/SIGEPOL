@extends('layouts.app')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <div class="d-flex justify-content-between mb-3">

        <h2>
            🚔 Detenidos Registrados
        </h2>

        <a href="/detenidos/crear"
           class="btn btn-primary">

            ➕ Nuevo Detenido

        </a>

    </div>

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            📋 Lista de Detenidos

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle text-center">

                <thead class="table-dark">

                    <tr>

                        <th>Número Puesta</th>
                        <th>Fecha</th>
                        <th>Folio IPH</th>
                        <th>Hora Puesta</th>
                        <th>Primer Respondiente</th>
                        <th>Lugar Detención</th>
                        <th>Detenido</th>
                        <th>RND</th>
                        <th>Domicilio</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Vehículo</th>
                        <th>Sanción</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($detenidos as $d)

                    <tr>

                        <td>{{ $d->numero_puesta }}</td>

                        <td>{{ $d->fecha }}</td>

                        <td>{{ $d->folio_iph }}</td>

                        <td>{{ $d->hora_puesta }}</td>

                        <td>{{ $d->primer_respondiente }}</td>

                        <td>{{ $d->lugar_detencion }}</td>

                        <td>{{ $d->detenido }}</td>

                        <td>{{ $d->rnd }}</td>

                        <td>{{ $d->domicilio_detenido }}</td>

                        <td>{{ $d->edad }}</td>

                        <td>{{ $d->sexo }}</td>

                        <td>{{ $d->vehiculo }}</td>

                        <td>{{ $d->sancion }}</td>

                        <td>

                            <!-- VER -->
                            <a href="/detenidos/{{ $d->id }}"
                               class="btn btn-info btn-sm mb-1">

                                👁 Ver

                            </a>

                            <!-- EDITAR -->
                            <a href="/detenidos/{{ $d->id }}/edit"
                               class="btn btn-warning btn-sm mb-1">

                                ✏ Editar

                            </a>

                            <!-- ELIMINAR -->
                            <form action="/detenidos/{{ $d->id }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar detenido?')">

                                    🗑 Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="14" class="text-center">

                            No hay detenidos registrados

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3 d-flex justify-content-center">

        {{ $detenidos->links() }}

    </div>

</div>

@endsection