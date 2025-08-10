<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manejo de Roles') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-lg sm:rounded-lg border border-[#03658C]">
                <div class="p-6 sm:px-20 bg-[#7EB0F2] border-b border-[#03658C] rounded-t-lg">
                    <div>
                        <a href="{{ route('roles.index') }}">
                            <div
                                class="inline-flex items-center px-4 py-2 mb-2 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#F25430] active:bg-[#F2B749] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#03658C] transition ease-in-out duration-150 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="mt-6">
                        <div class="mb-4">
                            <strong class="text-[#03658C] font-semibold">Nombre:</strong>
                            <span class="ml-2 text-[#03658C] font-medium">{{ $role->name }}</span>
                        </div>
                        <div class="mb-4">
                            <strong class="text-[#03658C] font-semibold">Permisos:</strong>
                            @if (!empty($rolePermissions))
                                <div class="inline-flex flex-wrap gap-2 mt-1">
                                    @foreach ($rolePermissions as $v)
                                        <span
                                            class="bg-[#F25430] text-white px-3 py-1 rounded-full text-xs font-semibold select-none hover:bg-[#F2B749] transition-colors duration-200 cursor-default">
                                            {{ $v->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>