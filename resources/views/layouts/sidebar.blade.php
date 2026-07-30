<div
x-data="{
    openReportes: {{ request()->is('reportes*') ? 'true' : 'false' }},
    openDetenidos: {{ request()->is('detenidos*') ? 'true' : 'false' }}
}"
class="sidebar-sigepol">

    <!-- ENCABEZADO -->
    <div class="sidebar-header">
        <div class="estado-sistema">
            🟢 Sistema Activo
        </div>

    </div>

    <!-- USUARIO -->
    <div class="usuario-panel">

        <div class="avatar">
            👮
        </div>

        <div>

            <strong>
                {{ Auth::user()->name }}
            </strong>

            <br>

            <small class="text-warning">
                {{ strtoupper(Auth::user()->role) }}
            </small>

        </div>

    </div>

    <hr class="text-secondary">

    <!-- MENÚ -->
    <ul class="nav flex-column">

        <!-- DASHBOARD -->
        <li class="nav-item">

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active-link' : 'text-white' }}">

                🏠 Dashboard

            </a>

        </li>

        <!-- REPORTES -->
        <li class="nav-item mt-2">

            <button
                @click="openReportes = !openReportes"
                class="nav-link text-white d-flex justify-content-between align-items-center w-100 bg-transparent border-0">

                <span>📋 Reportes</span>

                <span :class="{'rotate-180': openReportes}"
                      class="arrow">

                    ▼

                </span>

            </button>

            <div x-show="openReportes" x-transition>

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">

                        <a href="/reportes"
                           class="nav-link {{ request()->is('reportes') ? 'text-warning' : 'text-white' }}">

                            ▸ Ver Reportes

                        </a>

                    </li>

                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'elemento')

                    <li class="nav-item">

                        <a href="/reportes/crear"
                           class="nav-link {{ request()->is('reportes/crear') ? 'text-warning' : 'text-white' }}">

                            ▸ Nuevo Reporte

                        </a>

                    </li>

                    @endif

                </ul>

            </div>

        </li>

        <!-- DETENIDOS -->
        <li class="nav-item mt-2">

            <button
                @click="openDetenidos = !openDetenidos"
                class="nav-link text-white d-flex justify-content-between align-items-center w-100 bg-transparent border-0">

                <span>🚔 Detenidos</span>

                <span :class="{'rotate-180': openDetenidos}"
                      class="arrow">

                    ▼

                </span>

            </button>

            <div x-show="openDetenidos" x-transition>

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">

                        <a href="/detenidos"
                           class="nav-link {{ request()->is('detenidos') ? 'text-warning' : 'text-white' }}">

                            ▸ Ver Detenidos

                        </a>

                    </li>

                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'elemento')

                    <li class="nav-item">

                        <a href="/detenidos/crear"
                           class="nav-link {{ request()->is('detenidos/crear') ? 'text-warning' : 'text-white' }}">

                            ▸ Nuevo Detenido

                        </a>

                    </li>

                    @endif

                </ul>

            </div>

        </li>

        <!-- IMPORTAR -->
        @if(Auth::user()->role == 'admin')

        <li class="nav-item mt-2">

            <a href="/reportes/importar"
               class="nav-link text-white">

                📥 Importar Excel

            </a>

        </li>

        @endif

        <!-- ESTADISTICAS -->
        @if(Auth::user()->role == 'comandante')

        <li class="nav-item mt-2">

            <a href="{{ route('dashboard') }}"
               class="nav-link text-white">

                📊 Estadísticas

            </a>

        </li>

        @endif

    </ul>

    <!-- PIE -->
    <div class="sidebar-footer">

        SIGEPOL v1.0

        <br>

        <small>
            Ocoyoacac 2026
        </small>

    </div>

</div>

<style>

.sidebar-sigepol{
    position: fixed;
    top: 70px;
    left: 0;
    width: 280px;
    height: calc(100vh - 70px);
    background: linear-gradient(
        180deg,
       #6f9271,
        #0a1f11
    );
    color: white;
    padding: 15px;
    overflow-y: auto;
    box-shadow: 5px 0 20px rgba(0,0,0,.25);
}

.sidebar-header{
    text-align:center;
    margin-bottom:15px;
}

.estado-sistema{
    background:#1f6b4f;
    border-radius:10px;
    padding:6px;
    margin-top:10px;
    font-size:12px;
}

.usuario-panel{
    display:flex;
    align-items:center;
    gap:12px;
    background:rgba(255,255,255,.08);
    padding:12px;
    border-radius:12px;
}

.avatar{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#2f7d5a;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.nav-link{
    border-radius:10px;
    transition:.3s;
    margin-bottom:4px;
}

.nav-link:hover{
    background:#1f6b4f;
    color:white !important;
}

.active-link{
    background:#356d46;
    color:black !important;
    font-weight:bold;
}

.arrow{
    transition: transform .3s ease;
}

.rotate-180{
    transform: rotate(180deg);
}

.sidebar-footer{
    position:absolute;
    bottom:20px;
    left:0;
    width:100%;
    text-align:center;
    color:#bfbfbf;
    font-size:12px;
}

</style>