<x-crud-layout>
    <x-slot name="title">
        Detalle del paciente
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gray-300 border-b border-indigo-300">
                    <div class="row">
                        <div class="col-lg-12 margin-tb mb-4">
                            <div>
                                <a href="{{ route('patients.index') }}">
                                    <div class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Codigo:</strong>
                                {{ $patient->codigo }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Apellidos:</strong>
                                {{ $patient->apellidos }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Nombres:</strong>
                                {{ $patient->nombres }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Dni:</strong>
                                {{ $patient->dni }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Fecha de nacimiento:</strong>
                                {{ $patient->nacimiento }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Sexo:</strong>
                                {{ $patient->sexo }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Teléfono:</strong>
                                {{ $patient->telefono }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $patient->email }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Direccion:</strong>
                                {{ $patient->direccion }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Observaciones:</strong>
                                {{ $patient->observaciones }}
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-crud-layout>