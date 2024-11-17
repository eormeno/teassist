<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles manager') }}
        </h2>
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

                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <x-validation-errors class="mb-4" />
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" class="text-black" />
                            <x-input id="name" class="block mt-1 w-full bg-white" type="text" name="name"
                                value="{{ $role->name }}" required autofocus autocomplete="name" />
                        </div>

                        <div class="row">
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach ($permission as $value)
                                        <label>
                                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif
                                                name="permission[]" value="{{ $value->name }}" class="name">
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ms-4">
                                    {{ __('Modify role') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
