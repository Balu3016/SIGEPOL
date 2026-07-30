@extends('layouts.app')

@section('content')

<div class="container mt-4">

<div class="card shadow">
    <div class="card-header bg-warning">
        <h5>✏️ Editar Reporte {{ $reporte->folio }}</h5>
    </div>

    <div class="card-body">

<form action="/reportes/{{ $reporte->id }}" method="POST">
@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">

    <label>Auxilio</label>

    <select name="auxilio" class="form-select" required>

        <option value="">
            Seleccione un auxilio...
        </option>

        @foreach($auxilios as $auxilio)

            <option value="{{ $auxilio->nombre }}"
                {{ $reporte->auxilio == $auxilio->nombre ? 'selected' : '' }}>

                {{ $auxilio->nombre }}

            </option>

        @endforeach

    </select>

</div>

<div class="col-md-6 mb-3">
    <label>CRP</label>
    <input type="text" name="crp" class="form-control" value="{{ $reporte->crp }}">
</div>

<div class="col-md-6 mb-3">
    <label>Medio de Reporte</label>
    <select name="medio_reporte" class="form-control">
        <option {{ $reporte->medio_reporte == 'Llamada' ? 'selected' : '' }}>Llamada</option>
        <option {{ $reporte->medio_reporte == 'Radio' ? 'selected' : '' }}>Radio</option>
        <option {{ $reporte->medio_reporte == 'Cabina' ? 'selected' : '' }}>Cabina</option>
        <option {{ $reporte->medio_reporte == 'Directo' ? 'selected' : '' }}>Directo</option>
    </select>
</div>

<div class="col-md-3 mb-3">
    <label>Hora Reporte</label>
    <input type="time" name="hora_reporte" class="form-control" value="{{ $reporte->hora_reporte }}">
</div>

<div class="col-md-3 mb-3">
    <label>Hora Término</label>
    <input type="time" name="hora_termino" class="form-control" value="{{ $reporte->hora_termino }}">
</div>

<!-- COMUNIDAD -->
<div class="col-md-6 mb-3">

    <label>Comunidad</label>

    <select name="sector" class="form-select" required>

        <option value="">
            Seleccione una comunidad...
        </option>

        @foreach($comunidades as $comunidad)

            <option value="{{ $comunidad->nombre }}"
                {{ $reporte->sector == $comunidad->nombre ? 'selected' : '' }}>

                {{ $comunidad->nombre }}

            </option>

        @endforeach

    </select>

</div>

<div class="col-md-6 mb-3">
    <label>Calle</label>
    <input type="text" name="calle" class="form-control" value="{{ $reporte->calle }}">
</div>

<div class="col-md-6 mb-3">
    <label>Coordenadas</label>
    <input type="text" name="coordenadas" class="form-control" value="{{ $reporte->coordenadas }}">
</div>

<div class="col-md-6 mb-3">

    <label>Responsable</label>

    <select name="responsable" class="form-select" required>

        <option value="">
           {{ $reporte->responsable }}
        </option>

        @foreach($elementos as $elemento)

            <option value="{{ $elemento->nombre }}"
                {{ $reporte->responsable == $elemento->nombre ? 'selected' : '' }}>

                {{ $elemento->nombre }}

            </option>

        @endforeach

    </select>

</div>

<div class="col-md-6 mb-3">
    <label>Escolta</label>
    <input type="text" name="escolta" class="form-control" value="{{ $reporte->escolta }}">
</div>

<div class="col-md-6 mb-3">
    <label>Víctima</label>
    <input type="text" name="victima" class="form-control" value="{{ $reporte->victima }}">
</div>

<div class="col-md-6 mb-3">
    <label>Victimario</label>
    <input type="text" name="victimario" class="form-control" value="{{ $reporte->victimario }}">
</div>

<div class="col-md-6 mb-3">
    <label>Resultado</label>
    <select name="positivo" class="form-control">
        <option {{ $reporte->positivo == 'POSITIVO' ? 'selected' : '' }}>POSITIVO</option>
        <option {{ $reporte->positivo == 'NEGATIVO' ? 'selected' : '' }}>NEGATIVO</option>
    </select>
</div>

<div class="col-md-12 mb-3">
    <label>Resolución</label>
    <textarea name="resolucion" class="form-control">{{ $reporte->resolucion }}</textarea>
</div>

</div>

<button class="btn btn-warning w-100">Actualizar Reporte</button>

</form>

    </div>
</div>

</div>

@endsection