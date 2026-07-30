@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <!-- HEADER -->
        <div class="card-header bg-dark text-white">

            📥 Importar Reportes Excel

        </div>

        <!-- BODY -->
        <div class="card-body">

            <!-- FORMULARIO -->
            <form action="/reportes/importar"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- ARCHIVO -->
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Selecciona archivo Excel

                    </label>

                    <input type="file"
                           name="archivo"
                           class="form-control"
                           accept=".xlsx,.xls"
                           required>

                </div>

                <!-- BOTON -->
                <button type="submit"
                        class="btn btn-success">

                    📥 Importar Excel

                </button>

            </form>

        </div>

    </div>

</div>

<!-- ALERTA SUCCESS -->
@if(session('success'))

<script>

Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: '{{ session('success') }}',
    confirmButtonColor: '#198754'
});

</script>

@endif

<!-- ALERTA ERROR -->
@if(session('error'))

<script>

Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '{{ session('error') }}',
    confirmButtonColor: '#dc3545'
});

</script>

@endif

@endsection