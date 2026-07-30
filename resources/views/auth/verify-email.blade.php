<x-guest-layout>

    <div class="min-h-screen relative flex items-center justify-center overflow-hidden">

        <!-- FONDO -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/fondo-policial.jpg') }}"
                 alt="Fondo"
                 class="w-full h-full object-cover">
        </div>

        <!-- CAPA OSCURA -->
        <div class="absolute inset-0 bg-black/80"></div>

        <!-- EFECTOS -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-green-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>

        <!-- CONTENEDOR -->
        <div class="relative z-10 w-full max-w-3xl px-5">

            <div class="bg-white/5
                        backdrop-blur-2xl
                        border border-green-400/30
                        rounded-3xl
                        shadow-[0_0_40px_rgba(34,197,94,0.35)]
                        overflow-hidden">

                <!-- HEADER -->
                <div class="text-center p-8 border-b border-green-500/20">

                    <img
                        src="{{ asset('img/logo.png') }}"
                        alt="Logo"
                        class="w-32 h-32 mx-auto mb-4">

                    <h1 class="text-white text-4xl font-extrabold">
                        Verificación de Correo
                    </h1>

                    <h2 class="text-green-400 text-lg font-bold mt-2">
                        Sistema de Cotejo y Control Operativo
                    </h2>

                    <div class="mt-4 flex justify-center items-center gap-2">

                        <span class="h-3 w-3 rounded-full bg-green-500 animate-pulse"></span>

                        <span class="text-green-400 text-xs font-bold tracking-widest">
                            VALIDACIÓN DE USUARIO
                        </span>

                    </div>

                </div>

                <!-- CONTENIDO -->
                <div class="p-10">

                    <div class="text-center text-gray-300 leading-relaxed">

                        Gracias por registrarte.

                        <br><br>

                        Antes de comenzar a utilizar el sistema, es necesario verificar tu dirección de correo electrónico.

                        <br><br>

                        Revisa tu bandeja de entrada y da clic en el enlace de validación que fue enviado.

                    </div>

                    @if (session('status') == 'verification-link-sent')

                        <div class="mt-6 p-4 rounded-xl bg-green-600/20 border border-green-500/30 text-green-300 text-center">

                            ✅ Se ha enviado un nuevo enlace de verificación a tu correo electrónico.

                        </div>

                    @endif

                    <div class="mt-8 flex flex-col md:flex-row gap-4 justify-center">

                        <!-- REENVIAR -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full md:w-auto px-8 py-3 rounded-xl font-bold text-white
                                       bg-gradient-to-r from-green-700 to-emerald-500
                                       hover:from-green-800 hover:to-emerald-600
                                       transition-all duration-300
                                       shadow-xl">

                                📩 Reenviar Verificación

                            </button>

                        </form>

                        <!-- CERRAR SESION -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full md:w-auto px-8 py-3 rounded-xl font-bold text-white
                                       bg-gradient-to-r from-red-700 to-red-500
                                       hover:from-red-800 hover:to-red-600
                                       transition-all duration-300
                                       shadow-xl">

                                🚪 Cerrar Sesión

                            </button>

                        </form>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="text-center py-5 border-t border-green-500/20">

                    <p class="text-gray-300 text-xs">
                        Sistema Institucional de Gestión Operativa
                    </p>

                    <p class="text-gray-500 text-xs mt-2">
                        © {{ date('Y') }} Dirección de Seguridad Pública y Tránsito Municipal de Ocoyoacac
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>