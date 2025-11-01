<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full space-y-8">
        <div class="text-center">
            <!-- Logo-->
            <div class="flex justify-center mb-4">
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-red-100 shadow-lg">
                    <img 
                        src="https://raw.githubusercontent.com/victoriavalencia06/project-images/3b8fbedcb926b2d62d8b04bc6ae46638fed05288/hotelFairFields/logo/logo1.png" 
                        alt="Fairfield Hotel"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Iniciar Sesión</h2>
            <p class="mt-2 text-sm text-gray-600">Accede a tu cuenta</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="ejemplo@correo.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me & Links -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500 focus:border-red-500 transition duration-200"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="text-sm text-red-600 hover:text-red-500 font-medium transition duration-200" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    ¿No tienes cuenta?
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500 transition duration-200">
                        {{ __('Regístrate') }}
                    </a>
                    @endif
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>