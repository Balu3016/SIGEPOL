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
        <div class="relative z-10 w-full max-w-2xl px-5">

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
                        Confirmación de Seguridad
                    </h1>

                    <h2 class="text-green-400 text-lg font-bold mt-2">
                        Sistema de Cotejo y Control Operativo
                    </h2>

                    <div class="mt-4 flex justify-center items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-green-500 animate-pulse"></span>

                        <span class="text-green-400 text-xs font-bold tracking-widest">
                            ACCESO PROTEGIDO
                        </span>
                    </div>

                </div>

                <!-- FORM -->
                <div class="p-10">

                    <div class="mb-6 text-sm text-gray-300 text-center">

                        Por motivos de seguridad, confirme nuevamente su contraseña
                        antes de continuar con esta operación.

                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- PASSWORD -->
                        <div class="mb-6">

                            <label class="block text-gray-200 mb-2 font-semibold">
                                🔒 Contraseña Actual
                            </label>

                            <div class="relative">

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full rounded-xl bg-black/20 border border-green-500/40 text-white px-4 py-3 focus:border-green-400 focus:ring-green-400">

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

                        <!-- BOTÓN -->
                        <button
                            type="submit"
                            class="w-full py-4 rounded-xl font-bold text-white
                                   bg-gradient-to-r from-green-700 to-emerald-500
                                   hover:from-green-800 hover:to-emerald-600
                                   transition-all duration-300
                                   shadow-2xl text-lg">

                            ✅ CONFIRMAR IDENTIDAD

                        </button>

                    </form>

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
