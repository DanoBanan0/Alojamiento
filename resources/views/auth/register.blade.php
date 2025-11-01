<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full space-y-8">
        <!-- Header con Logo Redondo -->
        <div class="text-center">
            <!-- Logo Redondo -->
            <div class="flex justify-center mb-4">
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-red-100 shadow-lg">
                    <img 
                        src="https://raw.githubusercontent.com/victoriavalencia06/project-images/3b8fbedcb926b2d62d8b04bc6ae46638fed05288/hotelFairFields/logo/logo1.png" 
                        alt="Fairfield Hotel"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Crear Cuenta</h2>
            <p class="mt-2 text-sm text-gray-600">Regístrate en Fairfield Hotel</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre Completo')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Tu nombre completo" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

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
                    autocomplete="new-password"
                    placeholder="Contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirmar contraseña" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div>
                <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500 transition duration-200">
                        {{ __('Inicia Sesión') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>