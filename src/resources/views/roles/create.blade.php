<x-event-layout>
    <x-slot name="title">
        {{ __('Manejo de Roles -> Crear Rol') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gray-300 border-b border-indigo-300">
                    <div>
                        <a href="{{ route('roles.index') }}">
                            <div class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <x-validation-errors class="mb-4" />

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <x-label for="permission" value="{{ __('Permission') }}" />
                        <div class="row">
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">     
                                    <strong>Permisos:</strong>
                                    <br />                           
                                    @foreach ($permission as $value)                                
                                        <x-checkbox name="permission[]" value="{{ $value->name }}" />
                                        {{ $value->name }}
                                        <br />
                                    @endforeach
                                </div>    
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ms-4">
                                    {{ __('Crear Rol') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>