<x-app-layout>
    <x-slot name="title">
        {{ __('Roles Manager > Create') }}
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl font-semibold text-gray-100">Create New Role</h2>
                        <a href="{{ route('roles.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-700 text-gray-100 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Back to Roles List') }}
                        </a>
                    </div>

                    <x-validation-errors class="mb-4 text-red-400" />

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <!-- Role Name Input -->
                        <div class="mb-6">
                            <x-label for="name" value="{{ __('Name') }}" class="block text-gray-300 text-sm font-medium mb-2" />
                            <x-input id="name"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 placeholder-gray-400"
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    autocomplete="name" />
                        </div>

                        <!-- Permissions Section -->
                        <div class="mb-6">
                            <x-label for="permission" value="{{ __('Permissions') }}" class="block text-gray-300 text-sm font-medium mb-4" />

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($permission as $value)
                                    <div class="flex items-center space-x-3 p-3 rounded-lg bg-gray-700 hover:bg-gray-600 transition-colors duration-200">
                                        <x-checkbox
                                            name="permission[]"
                                            value="{{ $value->name }}"
                                            class="rounded border-gray-500 text-indigo-600 focus:ring-indigo-500 bg-gray-600" />
                                        <label class="text-gray-200 text-sm">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <x-button
                                class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500 transition-colors duration-200">
                                {{ __('Create Role') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
