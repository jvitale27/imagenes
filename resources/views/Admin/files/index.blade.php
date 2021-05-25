{{-- llamamos al componente de la pantalla principal --}}
<x-app-layout>

    <x-slot name="header">
        Vista de Ver Imagenes
    </x-slot>

    <div class="container mx-auto px-4 bg-gray-200">
        <section class="pt-8 px-4">
            <div class="flex flex-wrap -mx-4">
                @foreach ($files as $file)
                    <div class="md:w-1/3 px-4 mb-3">
                        <img class="rounded shadow-md mb-2" src="{{ Storage::url( $file->url) }}" alt="">
                        <div class="grid grid-cols-2 w-40 gap-4">
                            <a href="{{ route('admin.files.edit', $file) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">Editar</a>
                            <form action="{{ route('admin.files.destroy', $file) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    {{ $files->links() }}

</x-app-layout>