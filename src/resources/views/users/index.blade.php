<x-crud-layout>
    <x-slot name="title">
        {{ __('Gestor de Usuarios') }}
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-4">
        <h1 class="text-2xl font-bold text-[#1E1E49] mb-4">{{ __('Gestor de Usuarios') }}</h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}" class="btn-primary">
                Nuevo Usuario
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg mb-4">
                <thead class="bg-[#1E1E49] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Roles</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                        <tr class="{{ $key % 2 === 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200">
                            <td class="py-2 px-4 border-t whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $user->name }}
                            </td>
                            <td class="py-2 px-4 border-t whitespace-nowrap text-sm text-gray-500">
                                {{ $user->email }}
                            </td>
                            <td class="py-2 px-4 border-t whitespace-nowrap text-sm text-gray-500">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-secondary text-dark">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td class="py-2 px-4 border-t whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('users.show', $user->id) }}"
                                        class="action-btn view-btn bg-[#a4c2db] text-[#1E1E49] py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8"
                                        title="Ver">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="action-btn edit-btn bg-[#0075b2] text-white py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8"
                                        title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="delete-btn bg-[#dbf227] text-white py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8"
                                            title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-slot name="links">
            {{ $data->links() }}
        </x-slot>
    </div>

    <style>
        .roles-container {
            padding: 1.5rem;
        }

        .page-title {
            margin-bottom: 1rem;
        }

        .new-role-btn {
            text-decoration: none;
        }

        .roles-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .pagination {
            margin-top: 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .pagination .page-link {
            color: #0075B2;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
        }

        .pagination .page-item.active .page-link {
            background-color: #0075B2;
            color: white;
        }

        .action-btn,
        .delete-btn {
            transition: all 0.2s ease-in-out;
        }

        .action-btn:hover,
        .delete-btn:hover {
            transform: scale(1.05);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            background-color: #e2e8f0;
            color: #2d3748;
            margin-right: 0.5rem;
        }
    </style>
</x-crud-layout>
