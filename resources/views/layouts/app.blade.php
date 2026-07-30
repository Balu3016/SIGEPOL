<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name',) }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- 🔥 BOOTSTRAP CSS (SOLO UNA VEZ) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('layouts.navigation')

<div class="sigepol-wrapper">

    @include('layouts.sidebar')

    <main class="sigepol-content">

        @yield('content')

    </main>

</div>

<!-- 🔥 ESTILO FLECHA -->
<style>
.arrow {
    transition: transform 0.3s ease;
}

a[aria-expanded="true"] .arrow {
    transform: rotate(180deg);
}
</style>
<style>

body{
    background:#f4f6f9;
    overflow-x:hidden;
}

/* CONTENEDOR GENERAL */
.sigepol-wrapper{
    display:flex;
}

/* CONTENIDO */
.sigepol-content{
    margin-left:260px;
    margin-top:70px;
    width:100%;
    padding:100px;
}

/* TARJETAS */
.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

/* TABLAS */
.table{
    font-size:.90rem;
}

.arrow{
    transition:.3s;
}

a[aria-expanded="true"] .arrow{
    transform:rotate(180deg);
}

.sigepol-navbar{
    background: linear-gradient(
        90deg,
        #6f9271,
        #0a1f11
    );
    height: 75px;
    padding-left: 20px;
    padding-right: 20px;
}

.logo-navbar{
    height: 50px;
    width: auto;
    object-fit: contain;
}

.sigepol-navbar h5{
    letter-spacing:1px;
}


.nav-opciones{

    background: transparent;

    border: none;

    color: white;

    padding: 10px 15px;

    border-radius: 10px;

    transition: .3s;

    font-weight: 600;

}

.nav-opciones:hover{

    background: rgba(255,255,255,.12);

    color: white;

}

.nav-opciones:focus{

    box-shadow: none;

    outline: none;

}

.nav-opciones::after{

    margin-left: 8px;

}

</style>
<!-- 🔥 BOOTSTRAP JS (AL FINAL) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>