<x-event-layout>
    <x-slot name="title">
        {{ __('Manejo de Roles -> Crear Rol') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-lg sm:rounded-lg border border-[#03658C]">
                <div class="p-6 sm:px-20 bg-[#7EB0F2] border-b border-[#03658C] rounded-t-lg">
    
                    <div>
                        <a href="{{ route('roles.index') }}">
                            <div
                                class="inline-flex items-center px-4 py-2 mb-4 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#7EB0F2] active:bg-[#02475e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#03658C] transition ease-in-out duration-150 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>
    
                    <x-validation-errors class="mb-4" />
    
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
    
                        <div>
                            <x-label for="name" class="text-[#03658C] font-semibold" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full border-[#03658C] focus:border-[#F25430] focus:ring-[#F25430]" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>
    
                        <div class="mt-6">
                            <strong class="text-[#03658C] font-semibold">Permisos:</strong>
                            <div class="mt-2 max-h-56 overflow-y-auto border border-[#03658C] rounded-md bg-white p-4">
                                @foreach ($permission as $value)
                                    <label class="inline-flex items-center mb-2 cursor-pointer select-none text-[#03658C] hover:text-[#F25430] transition-colors duration-200">
                                        <x-checkbox name="permission[]" value="{{ $value->name }}" class="form-checkbox text-[#F25430] focus:ring-[#F25430]" />
                                        <span class="ml-2">{{ $value->name }}</span>
                                    </label>
                                    <br />
                                @endforeach
                            </div>
                        </div>
    
                        <div class="flex items-center justify-end mt-6">
                            <x-button
                                class="bg-[#F25430] hover:bg-[#F2B749] focus:bg-[#d74621] text-white font-semibold transition-colors duration-200 shadow-md">
                                {{ __('Crear Rol') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-event-layout>