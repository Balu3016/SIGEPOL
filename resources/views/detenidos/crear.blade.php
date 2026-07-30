@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h5>📝 INGRESAR DETENIDO</h5>
        </div>

        <div class="card-body">

            <form action="/detenidos" method="POST">

                @csrf

                <div class="row">

                    <!-- NUMERO DE PUESTA -->
                    <div class="col-md-4 mb-3">
                        <label>Número de Puesta</label>
                        <input type="text"
                               name="numero_puesta"
                               class="form-control"
                               required>
                    </div>

                    <!-- FECHA -->
                    <div class="col-md-4 mb-3">
                        <label>Fecha</label>
                        <input type="date"
                               name="fecha"
                               class="form-control"
                               required>
                    </div>

                    <!-- FOLIO IPH -->
                    <div class="col-md-4 mb-3">
                        <label>Folio IPH</label>
                        <input type="text"
                               name="folio_iph"
                               class="form-control">
                    </div>

                    <!-- HORA PUESTA -->
                    <div class="col-md-4 mb-3">
                        <label>Hora de Puesta</label>
                        <input type="time"
                               name="hora_puesta"
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

                            <option value="Escamilla Linares Adrian">
                                Escamilla Linares Adrian
                            </option>

                        </select>

                    </div>

                    <!-- LUGAR DETENCION -->
                    <div class="col-md-12 mb-3">
                        <label>Lugar de Detención</label>
                        <input type="text"
                               name="lugar_detencion"
                               class="form-control"
                               required>
                    </div>

                    <!-- DETENIDO -->
                    <div class="col-md-6 mb-3">
                        <label>Nombre del Detenido</label>
                        <input type="text"
                               name="detenido"
                               class="form-control"
                               required>
                    </div>

                    <!-- RND -->
                    <div class="col-md-6 mb-3">
                        <label>RND</label>
                        <input type="text"
                               name="rnd"
                               class="form-control">
                    </div>

                    <!-- DOMICILIO -->
                    <div class="col-md-12 mb-3">
                        <label>Domicilio del Detenido</label>
                        <input type="text"
                               name="domicilio_detenido"
                               class="form-control">
                    </div>

                    <!-- EDAD -->
                    <div class="col-md-3 mb-3">
                        <label>Edad</label>
                        <input type="number"
                               name="edad"
                               class="form-control">
                    </div>

                    <!-- SEXO -->
                    <div class="col-md-3 mb-3">
                        <label>Sexo</label>

                        <select name="sexo"
                                class="form-control">

                            <option value="">Seleccione...</option>

                            <option value="MASCULINO">
                                MASCULINO
                            </option>

                            <option value="FEMENINO">
                                FEMENINO
                            </option>

                        </select>

                    </div>

                    <!-- VEHICULO -->
                    <div class="col-md-6 mb-3">
                        <label>Vehículo Relacionado</label>
                        <input type="text"
                               name="vehiculo"
                               class="form-control">
                    </div>

                    <!-- SANCION -->
                    <div class="col-md-12 mb-3">
                        <label>Sanción / Motivo de la Puesta</label>

                        <textarea name="sancion"
                                  rows="4"
                                  class="form-control"></textarea>

                    </div>

                    <!-- BOTON -->
                    <div class="col-md-12">

                        <button type="submit"
                                class="btn btn-success w-100">

                            💾 Guardar Detenido

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection