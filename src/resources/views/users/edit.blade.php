<x-event-layout>
    <x-slot name="title">
        {{ __('Users Manager > Edit user') }}
    </x-slot>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl border border-gray-700">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-100">Edit User Profile</h2>
                        <p class="mt-1 text-sm text-gray-400">Update user information and roles</p>
                    </div>

                    <x-validation-errors class="mb-6" />

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <x-label for="name" value="{{ __('Name') }}"
                                class="text-gray-300 font-medium" />
                            <x-input id="name"
                                class="block w-full bg-gray-900 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-100"
                                type="text"
                                name="name"
                                value="{{ $user->name }}"
                                required
                                autofocus
                                autocomplete="name" />
                        </div>

                        <!-- Email Field -->
                        <div class="mt-6 space-y-2">
                            <x-label for="email" value="{{ __('Email') }}"
                                class="text-gray-300 font-medium" />
                            <x-input id="email"
                                class="block w-full bg-gray-900 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-100"
                                type="email"
                                name="email"
                                value="{{ $user->email }}"
                                required
                                autocomplete="username" />
                        </div>

                        <!-- Roles Selection -->
                        <div class="mt-6 space-y-2">
                            <x-label for="options" value="{{ __('Select Roles') }}"
                                class="text-gray-300 font-medium" />
                            <div class="relative">
                                <select id="options"
                                    name="roles[]"
                                    multiple
                                    class="block w-full bg-gray-900 border-gray-700 text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm min-h-[120px] p-2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}"
                                            @if (in_array($role, $userRole)) selected @endif
                                            class="py-2 px-3 hover:bg-gray-700">
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm text-gray-400 mt-2">Hold Ctrl/Cmd to select multiple roles</p>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-700">
                            <button type="button"
                                onclick="window.location='{{ route('users.index') }}'"
                                class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-lg font-medium text-sm text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                {{ __('Back') }}
                            </button>

                            <x-button
                                class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Save Changes') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>
