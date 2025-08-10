<x-crud-layout>
    <x-slot name="title">
        Detalle de la actividad
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-xl sm:rounded-lg border border-[#03658C]">
              <div class="p-6 sm:px-20 bg-[#7EB0F2] border-b border-[#03658C] rounded-t-lg">
                <div class="row">
                  <div class="col-lg-12 margin-tb mb-4">
                    <div class="pull-left">
                      <a href="{{ route('activities.index') }}">
                        <div
                          class="inline-flex items-center px-4 py-2 mb-2 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#024B6B] active:bg-[#013A50] focus:outline-none focus:border-[#013A50] focus:ring ring-[#024B6B] disabled:opacity-25 transition ease-in-out duration-150"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                          </svg>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 mb-3">
                    <div class="form-group text-[#024B6B] font-semibold">
                      <strong>Nombre:</strong>
                      <span class="font-normal text-black">{{ $activity->name }}</span>
                    </div>
                  </div>
                  <div class="col-xs-12 mb-3">
                    <div class="form-group text-[#024B6B] font-semibold">
                      <strong>Descripción:</strong>
                      <span class="font-normal text-black">{{ $activity->description }}</span>
                    </div>
                  </div>
                  <div class="col-xs-12 mb-3">
                    <div class="form-group">
                      <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255" class="border border-[#03658C] rounded-md shadow-sm" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

</x-crud-layout>