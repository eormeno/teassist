<x-event-layout>
    <x-slot name="title">
        {{ __('Manejo de Usuarios -> Editar Usuario') }}
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-[#7EB0F2] border-b border-[#03658C]">
                    <div>
                        <a href="{{ route('users.index') }}">
                            <div class="inline-flex items-center px-4 py-2 mb-2 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#F25430] active:bg-[#F2B749] focus:outline-none focus:border-[#F2B749] focus:ring ring-[#F2B749] disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <x-validation-errors class="mb-4" />
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-label for="name" style="color: #000000;" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ $user->name }}" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" style="color: #000000;"  value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ $user->email }}" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="options" style="color: #000000;" value="{{ __('Select Roles') }}" />
                            <select id="options" name="roles[]" multiple
                                class=" bg-white text-indigo-800 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm block mt-1 w-80">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}"
                                        @if (in_array($role, $userRole)) selected @endif>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#02506E] active:bg-[#013B52] focus:outline-none focus:border-[#013B52] focus:ring ring-[#7EB0F2] disabled:opacity-25">
                                {{ __('Editar Usuario') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>