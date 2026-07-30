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

        <!-- EFECTOS VERDES -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-green-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>

        <!-- CONTENIDO -->
        <div class="relative z-10 w-full max-w-2xl px-5">

            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="text-center p-10 border-b border-green-500/20">

                    <img
                        src="{{ asset('img/logo.png') }}"
                        alt="Logo"
                        class="w-25 h-40 mx-auto mb-4 drop-shadow-2xl">

                    <h1 class="text-white text-4xl font-extrabold tracking-wide">
                       🔑 Ingreso al sistema 
                    </h1>

                    <h2 class="text-green-400 text-xl font-bold mt-3">
                        Sistema Integral de Gestión Policial
                    </h2>

                    <p class="text-gray-300 text-sm mt-4">
                        Dirección de Seguridad Pública y Tránsito Municipal de Ocoyoacac
                    </p>

                </div>

                <!-- FORMULARIO -->
                <div class="p-10">

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- CORREO -->
                        <div class="mb-6">

                            <label class="block text-gray-200 mb-2 font-semibold">
                                📧 Correo Electrónico
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full rounded-xl bg-black/20 border border-green-500/40 text-white placeholder-gray-400 px-4 py-3 focus:border-green-400 focus:ring-green-400">

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2 text-red-300" />

                        </div>

                        <!-- CONTRASEÑA -->
                        <div class="mb-6">

                            <label class="block text-gray-200 mb-2 font-semibold">
                                🔒 Contraseña
                            </label>

                            <div class="relative">

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    class="w-full rounded-xl bg-black/20 border border-green-500/40 text-white placeholder-gray-400 px-4 py-3 focus:border-green-400 focus:ring-green-400">

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-4 top-3 text-white hover:text-green-400">

                                    👁️

                                </button>

                            </div>

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2 text-red-300" />

                        </div>

                        <!-- RECORDAR -->
                        <div class="mb-6">

                            <label class="inline-flex items-center text-gray-300">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-gray-500 text-green-500">

                                <span class="ml-2">
                                    Recordarme
                                </span>

                            </label>

                        </div>

                        <!-- BOTÓN -->
                        <button
                            type="submit"
                            class="w-full py-4 rounded-xl font-bold text-white
                                   bg-gradient-to-r from-green-700 to-emerald-500
                                   hover:from-green-800 hover:to-emerald-600
                                   transition-all duration-300
                                   shadow-2xl text-lg">

                            🚔 ACCEDER AL SISTEMA

                        </button>


                         <!-- VOLVER -->
                        <div class="text-center mt-6">

                            <a href="{{ route('register') }}"
                               class="text-green-300 hover:text-green-100">

                                 Crea Tu cuenta Solo Elementos

                            </a>

                        </div>

                        <!-- RECUPERAR CONTRASEÑA -->
                        @if (Route::has('password.request'))

                            <div class="text-center mt-6">

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-green-300 hover:text-green-100 text-sm">

                                    ¿Olvidaste tu contraseña?

                                </a>

                            </div>

                        @endif

                    </form>

                </div>

                <!-- FOOTER -->
                <div class="text-center py-5 border-t border-green-500/20">

                    <p class="text-gray-300 text-xs tracking-wide">
                       SIGEPOL-CENTINELA 360
                    </p>

                    <p class="text-gray-500 text-xs mt-2">
                        © {{ date('Y') }} Dirección de Seguridad Pública y Tránsito Municipal de Ocoyoacac
                    </p>

                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePassword() {

            let password = document.getElementById('password');

            if(password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }

        }
    </script>

</x-guest-layout>