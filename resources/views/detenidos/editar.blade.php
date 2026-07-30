@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
    <h5>✏️ EDITAR DETENIDO</h5>
</div>

        <div class="card-body">

            <form action="/detenidos/{{ $detenido->id }}" method="POST">

    @csrf
    @method('PUT')

                <div class="row">

                    <!-- NUMERO DE PUESTA -->
                    <div class="col-md-4 mb-3">
                        <label>Número de Puesta</label>
                        <input type="text"
       name="numero_puesta"
       value="{{ $detenido->numero_puesta }}"
       class="form-control"
       required>
                    </div>

                    <!-- FECHA -->
                    <div class="col-md-4 mb-3">
                        <label>Fecha</label>
                       <input type="date"
       name="fecha"
       value="{{ $detenido->fecha }}"
       class="form-control"
       required>
                    </div>

                    <!-- FOLIO IPH -->
                    <div class="col-md-4 mb-3">
                        <label>Folio IPH</label>
                        <input type="text"
       name="folio_iph"
       value="{{ $detenido->folio_iph }}"
       class="form-control">
                    </div>

                    <!-- HORA PUESTA -->
                    <div class="col-md-4 mb-3">
                        <label>Hora de Puesta</label>
                       <input type="time"
       name="hora_puesta"
       value="{{ $detenido->hora_puesta }}"
       class="form-control"
       required>
                    </div>

                    <!-- PRIMER RESPONDIENTE -->
                    <div class="col-md-8 mb-3">
                        <label>Primer Respondiente</label>

                        <select name="primer_respondiente"
        class="form-control"
        required>

    <option value="">Seleccione...</option>

    <option value="Escamilla Linares Adrian"
        {{ $detenido->primer_respondiente == 'Escamilla Linares Adrian' ? 'selected' : '' }}>
        Escamilla Linares Adrian
    </option>

</select>

                    </div>

                    <!-- LUGAR DETENCION -->
                    <div class="col-md-12 mb-3">
                        <label>Lugar de Detención</label>
                        <input type="text"
       name="lugar_detencion"
       value="{{ $detenido->lugar_detencion }}"
       class="form-control"
       required>
                    </div>

                    <!-- DETENIDO -->
                    <div class="col-md-6 mb-3">
                        <label>Nombre del Detenido</label>
                        <input type="text"
       name="detenido"
       value="{{ $detenido->detenido }}"
       class="form-control"
       required>
                    </div>

                    <!-- RND -->
                    <div class="col-md-6 mb-3">
                        <label>RND</label>
                        <input type="text"
       name="rnd"
       value="{{ $detenido->rnd }}"
       class="form-control">
                    </div>

                    <!-- DOMICILIO -->
                    <div class="col-md-12 mb-3">
                        <label>Domicilio del Detenido</label>
                       <input type="text"
       name="domicilio_detenido"
       value="{{ $detenido->domicilio_detenido }}"
       class="form-control">
                    </div>

                    <!-- EDAD -->
                    <div class="col-md-3 mb-3">
                        <label>Edad</label>
                        <input type="number"
       name="edad"
       value="{{ $detenido->edad }}"
       class="form-control">
                    </div>

                    <!-- SEXO -->
                    <div class="col-md-3 mb-3">
                        <label>Sexo</label>

                        <select name="sexo"
        class="form-control">

    <option value="">Seleccione...</option>

    <option value="MASCULINO"
        {{ $detenido->sexo == 'MASCULINO' ? 'selected' : '' }}>
        MASCULINO
    </option>

    <option value="FEMENINO"
        {{ $detenido->sexo == 'FEMENINO' ? 'selected' : '' }}>
        FEMENINO
    </option>

</select>

                    </div>

                    <!-- VEHICULO -->
                    <div class="col-md-6 mb-3">
                        <label>Vehículo Relacionado</label>
                        <input type="text"
       name="vehiculo"
       value="{{ $detenido->vehiculo }}"
       class="form-control">
                    </div>

                    <!-- SANCION -->
                    <div class="col-md-12 mb-3">
                        <label>Sanción / Motivo de la Puesta</label>

                        <textarea name="sancion"
          rows="4"
          class="form-control">{{ $detenido->sancion }}</textarea>

                    </div>

                    <!-- BOTON -->
                    <div class="col-md-12">

                        <button type="submit"
        class="btn btn-warning w-100">

    💾 Actualizar Detenido

</button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection