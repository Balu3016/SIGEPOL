@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5>📝 Crear Reporte Policial (IPH)</h5>
        </div>

        <div class="card-body">

            <form action="/reportes" method="POST">
                @csrf

                <div class="row">

                    <!-- AUXILIO -->
                    <div class="col-md-6 mb-3">

                        <label>Auxilio</label>

                        <select name="auxilio" class="form-control" required>

                            <option value="">Seleccione un auxilio</option>

                            @foreach($auxilios as $auxilio)

                                <option value="{{ $auxilio->nombre }}">
                                    {{ $auxilio->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- CRP  9 unidades  -->
                    <div class="col-md-6 mb-3">
                        <label>CRP- Unidades</label>
                        <select name="crp" class="form-control">
                            <option value="">Seleccionar</option>
                            <option>CRP-94</option>
                            <option>CRP-105</option>
                            <option>CRP-106</option>
                            <option>CRP-107</option>
                            <option>CRP-108</option>
                            <option>CRP-109</option>
                            <option>CRP-110</option>
                            <option>CRP-111</option>
                            <option>CRP-112</option>
                        </select>
                    </div>

                    <!-- MEDIO REPORTE -->
                    <div class="col-md-6 mb-3">
                        <label>Medio de Reporte</label>
                        <select name="medio_reporte" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option>(LL) Llamada</option>
                            <option>(AW) Apliativo WhatsApp</option>
                            <option>(C5) Llamada de emergencia 911</option>
                            <option>(OF) Oficio</option>
                            <option>(CD) Contacto Directo</option>
                            <option>(AVO) Aplicativo ViveOcoyacac</option>
                        </select>
                    </div>

                    <!-- HORA REPORTE -->
                    <div class="col-md-3 mb-3">
                        <label>Hora de Reporte</label>
                        <input type="time" name="hora_reporte" class="form-control" required>
                    </div>

                    <!-- HORA TERMINO -->
                    <div class="col-md-3 mb-3">
                        <label>Hora de Término</label>
                        <input type="time" name="hora_termino" class="form-control" required>
                    </div>

                    <!-- SECTOR indispensable de base de datos -->
                   <div class="col-md-6 mb-3">
    <label>Sector / Comunidad</label>

    <select name="sector" class="form-control" required>

        <option value="">
            Seleccione una comunidad...
        </option>

        @foreach($comunidades as $comunidad)

            <option value="{{ $comunidad->nombre }}">
                {{ $comunidad->nombre }}
            </option>

        @endforeach

    </select>

</div>

                  <!-- RESPONSABLE -->
<div class="col-md-6 mb-3">

    <label>Responsable</label>

                                <select name="responsable"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        Seleccione un elemento
                                    </option>

                                    @foreach($elementos as $elemento)

                                        <option value="{{ $elemento->nombre }}">

                                            {{ $elemento->nombre }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>
                    <!-- ESCOLTA  indispensable de base de datos-->
                    <div class="col-md-6 mb-3">
                        <label>Escolta</label>
                        <input type="text" name="escolta" class="form-control" placeholder="Opcional">
                    </div>

                    <!-- CALLE -->
                    <div class="col-md-6 mb-3">
                        <label>Calle</label>
                        <input type="text" name="calle" class="form-control" required>
                    </div>

                    <!-- COORDENADAS -->
                    <div class="col-md-6 mb-3">
                        <label>Coordenadas</label>
                        <input type="text" name="coordenadas" class="form-control" placeholder="19.123, -99.123">
                    </div>

                    <!-- VICTIMA -->
                    <div class="col-md-6 mb-3">
                        <label>Víctima</label>
                        <input type="text" name="victima" class="form-control">
                    </div>

                    <!-- VICTIMARIO -->
                    <div class="col-md-6 mb-3">
                        <label>Victimario</label>
                        <input type="text" name="victimario" class="form-control">
                    </div>

                    <!-- POSITIVO -->
                    <div class="col-md-6 mb-3">
                        <label>Resultado</label>
                        <select name="positivo" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option>POSITIVO</option>
                            <option>NEGATIVO</option>
                        </select>
                    </div>

                    <!-- RESOLUCION -->
                    <div class="col-md-12 mb-3">
                        <label>Resolución</label>
                        <textarea name="resolucion" class="form-control" rows="4" required></textarea>
                    </div>

                </div>

                <button class="btn btn-success w-100">💾 Guardar Reporte</button>

            </form>

        </div>
    </div>

</div>

@endsection
