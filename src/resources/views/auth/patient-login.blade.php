<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('patient.login') }}">
            @csrf
            <div>
                <x-label for="codigo" value="{{ __('Codigo del paciente') }}" />
                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" placeholder="Ingresa tu código aquí" required
                    autofocus/>
            </div>


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <!--

                -->

                <x-button class="ms-4" type="button" onclick="location.href='{{ route('register') }}'">
                    {{ __('Registrarse') }}
                </x-button>

                <x-button class="ms-4">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
