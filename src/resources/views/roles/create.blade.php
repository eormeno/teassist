<x-event-layout>
    <x-slot name="title">
        {{ __('Roles manager > Create') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <x-button onclick="location.href='{{ route('roles.index') }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </x-button>

                    <x-button onclick="location.href='{{ route('roles.index') }}'"
                        class="inline-flex items-center px-4 py-2 mb-2 border border-transparent rounded-md font-semibold text-xs text-white disabled:opacity-25 transition ease-in-out duration-150 float-end">
                        {{ __('Roles list') }}
                    </x-button>

                    <x-validation-errors class="mb-4" />

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <x-label for="permission" value="{{ __('Permission') }}" />
                        <div class="mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                @foreach ($permission as $value)
                                    <x-checkbox name="permission[]" value="{{ $value->name }}" />
                                    {{ $value->name }}
                                    <br />
                                @endforeach
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ms-4">
                                    {{ __('Create role') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>
