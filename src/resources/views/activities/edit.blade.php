<x-crud-layout>
    <x-slot name="title">Modificar actividad</x-slot>

   <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-xl sm:rounded-lg border border-[#03658C]">
              <div class="p-6 sm:px-20 bg-[#7EB0F2] border-b border-[#03658C] rounded-t-lg">
                <div>
                  <a href="{{ route('activities.index') }}">
                    <div
                      class="inline-flex items-center px-4 py-2 mb-2 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#024B6B] active:bg-[#013A50] focus:outline-none focus:border-[#013A50] focus:ring ring-[#024B6B] disabled:opacity-25 transition ease-in-out duration-150"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                      </svg>
                    </div>
                  </a>
                </div>
                <x-validation-errors class="mb-4" />
                <form action="{{ route('activities.update', $activity) }}" method="POST" class="mt-2" enctype="multipart/form-data" novalidate>
                  @csrf
                  @method('PUT')
                  <div class="mt-2">
                    <x-label style="color: #024B6B;" for="name" value="Nombre" />
                    <x-input id="name" class="block mt-1 w-full border-[#03658C]" type="text" name="name"
                      value="{{ $activity->name }}" required autofocus autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                  </div>
                  <div class="mt-2">
                    <x-label style="color: #024B6B;" for="description" value="Descripción" />
                    <textarea name="description" id="description" cols="30" rows="5"
                      class="border-[#03658C] rounded-md shadow-sm block mt-1 w-full text-black"
                      required>{{ $activity->description }}</textarea>
                  </div>
                  <div class="mt-2">
                    <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255" class="border border-[#03658C] rounded-md shadow-sm" />
                  </div>
                  <div class="mt-2">
                    <x-label style="color: #024B6B;" for="image" value="Imagen" />
                    <x-input id="image" class="block mt-1 w-full border-[#03658C]" type="file" name="image" :value="old('image')" autocomplete="image" />
                  </div>
                  <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4 py-2 px-6 text-xl" style="background:#03658C; color: white;">
                      {{ __('Modificar actividad') }}
                    </x-button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

</x-crud-layout>