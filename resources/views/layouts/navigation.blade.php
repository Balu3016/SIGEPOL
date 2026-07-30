<nav class="navbar navbar-expand-lg fixed-top sigepol-navbar">

    <div class="container-fluid">

        <!-- IZQUIERDA -->
        <div class="d-flex align-items-center">

            <img src="{{ asset('img/logo.png') }}"
                 class="logo-navbar me-3"
                 alt="Logo">

            <div>

                <h4 class="mb-0 fw-bold text-white">
                    SIGEPOL-CENTINELA 360
                </h4>

                <small class="text-light">
                    Sistema Integral de Gestión Policial
                </small>

            </div>

        </div>


        <!-- DERECHA -->
        <div class="d-flex align-items-center gap-3">

            <!-- USUARIO -->
            <div class="usuario-navbar text-white">

                <small>
                    Dirección de Seguridad Pública
                </small>

            </div>

            <!-- MENÚ -->
            <div class="dropdown">

                <button class="nav-opciones dropdown-toggle"
                    data-bs-toggle="dropdown">

                    ⚙️ Opciones

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item"
                           href="{{ route('profile.edit') }}">

                            👤 Perfil

                        </a>

                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button class="dropdown-item">

                                🚪 Cerrar Sesión

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>


