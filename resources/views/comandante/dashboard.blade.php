@extends('layouts.app')

@section('content')

       <!-- 🔥 BIENVENIDA -->
    <div class="d-flex justify-content-between align-items-center mb-4">

       <h3 class="fw-bold">
    👮 Bienvenido, {{ Auth::user()->name }}
</h3>

<small class="text-muted">
    Perfil: {{ ucfirst(Auth::user()->role) }}
</small>

        

    </div>

@endsection