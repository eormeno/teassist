<x-crud-layout>
    <x-slot name="title">Nueva Actividad</x-slot>

    <div class="py-12">
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
                <div>
                  <x-validation-errors class="mb-4" />
                </div>
                <form action="{{ route('activities.store') }}" method="POST" class="mt-2" novalidate enctype="multipart/form-data">
                  @csrf
                  <div class="mt-2">
                    <x-label style="color: #024B6B;" for="name" value="Nombre" />
                    <x-input id="name" class="block mt-1 w-full border-[#03658C]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                  </div>
                  <div class="mt-2">
                    <x-label style="color: #024B6B;" for="description" value="Descripción" />
                    <textarea name="description" id="description" cols="30" rows="5" class="border-[#03658C] rounded-md shadow-sm block mt-1 w-full text-black" required>{{ old('description') }}</textarea>
                    <x-input-error for="description" class="mt-2" />
                  </div>
                  <div class="mb-3">
                    <x-label style="color: #024B6B;" for="image" value="Imagen" />
                    <x-input id="image" class="block mt-1 w-full border-[#03658C]" type="file" name="image" :value="old('image')" required autocomplete="image" />
                    <x-input-error for="image" class="mt-2" />
                  </div>
                  <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4 py-2 px-6 text-xl" style="background:#03658C; color: white;">Crear actividad</x-button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

</x-crud-layout>