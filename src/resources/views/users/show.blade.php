<x-event-layout>
    <x-slot name="title">
        {{ __('Users Manager') }}
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl border border-gray-700">
                <div class="p-8 sm:px-20">
                    <!-- Header with Back Button -->
                    <div class="flex justify-end mb-8">
                        <x-button
                            onclick="window.location='{{ route('users.index') }}'"
                            class="bg-gray-700 text-gray-200 hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-700 focus:ring-gray-500"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            {{ __('Back') }}
                        </x-button>
                    </div>

                    <!-- User Details Card -->
                    <div class="bg-gray-900 rounded-xl p-6 space-y-6 border border-gray-700">
                        <!-- Name -->
                        <div class="flex flex-col space-y-2">
                            <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Name</span>
                            <span class="text-lg text-gray-100">{{ $user->name }}</span>
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col space-y-2">
                            <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Email</span>
                            <span class="text-lg text-gray-100">{{ $user->email }}</span>
                        </div>

                        <!-- Roles -->
                        <div class="flex flex-col space-y-2">
                            <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Roles</span>
                            <div class="flex flex-wrap gap-2">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                            {{ $v }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>
