{{-- llamamos al componente de la pantalla principal --}}
<x-app-layout>

    {{-- estilos agregados para que funcione dropzone https://cdnjs.com/libraries/dropzone https://www.dropzonejs.com/--}}
    <x-slot name="mi_css">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

    <x-slot name="header">
        <div class="text-xl">Vista de Crear Imagenes</div>
    </x-slot>

    {{-- este seria el slot principal --}}
    <div class="container px-20 py-4">
        <div class="w-full bg-white rounded shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Subir Imagen</div>

                    {{-- formulario comun para seleccionar de a un archivo por vez
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
                    </form>--}}

                    {{-- formulario dropzone para seleccionar varios archivos a la vez https://cdnjs.com/libraries/dropzone https://www.dropzonejs.com/--}}
                    <form action="{{ route('admin.files.store') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- script agregados para que funcione dropzone https://cdnjs.com/libraries/dropzone https://www.dropzonejs.com/--}}
    <x-slot name="mi_js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>

        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {                                {{-- para enviar comandos adicionales --}}
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"   {{-- envio token csrf --}}
                },

                dictDefaultMessage : "Arrastre imagenes al recuadro para subirlas",
                acceptedFiles: "image/*",
                maxFilesize: 2,             // MB
                maxFiles: 4,
                // paramName: 'picture',  {{-- el nombre utilizado para transferirlas. por defecto 'file' --}}

            };
        </script>

    </x-slot>

</x-app-layout>
