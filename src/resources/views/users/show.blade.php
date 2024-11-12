<x-event-layout>
    <x-slot name="title">
        {{ __('Users Manager') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <a href="{{ route('patients.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-2 bg-azullogo border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Volver
                </a>
                    <div class="row">
                        <div class="col-lg-12 margin-tb mb-4">
                            <div class="pull-left">
                                <div class="float-end">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Roles:</strong>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-secondary text-dark">{{ $v }}</label>
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
