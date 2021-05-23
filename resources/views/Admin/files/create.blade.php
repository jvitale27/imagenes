{{-- llamamos al componente de la pantalla principal --}}
<x-app-layout>

    <x-slot name="header">
        <div class="text-xl">Vista de Crear Imagenes</div>
    </x-slot>

    {{-- este seria el slot principal --}}
    <div class="container px-20 py-4">
        <div class="w-full bg-white rounded shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Subir Imagen</div>
                    <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <input type="file" name="file" accept="image/*">
                        </div>

                        @error('file')
                            <small class="text-red-400">{{ $message }}</small>
                            <br>
                        @enderror

                        <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-5 rounded">Subir imagenes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>