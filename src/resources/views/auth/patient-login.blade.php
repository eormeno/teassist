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

        <form method="POST" action="{{ route('patient.login.submit') }}">
            @csrf

            <div>
                <x-label for="codigo" value="{{ __('Código único del paciente') }}" />
                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Ingresar como paciente') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
