<x-crud-layout>
    <x-slot name="title">
        {{ __('Users Manager > Create new user') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <a href="{{ route('roles.index') }}"
                        class="btn-primary inline-flex items-center px-4 py-2 mb-2 ">
                        {{ __('Lista de Usuarios') }}
                    </a>

                    <x-validation-errors class="mb-4" />

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" class="font-semibold label-custom-blue" />
                            <x-input id="name" class="block mt-1 w-full input-bg-white" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" class="font-semibold label-custom-blue"/>
                            <x-input id="email" class="block mt-1 w-full input-bg-white" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" class="font-semibold label-custom-blue"/>
                            <x-input id="password" class="block mt-1 w-full input-bg-white" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-semibold label-custom-blue" />
                            <x-input id="password_confirmation" class="block mt-1 w-full input-bg-white" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="options" value="{{ __('Select Roles') }}" class="font-semibold label-custom-blue" />
                            <select id="options" name="roles[]" multiple
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-black-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full input-bg-white">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="btn-primary">
                                {{ __('Crear Usuario') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>
