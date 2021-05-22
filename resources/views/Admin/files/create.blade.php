{{-- llamamos al componente de la pantalla principal --}}
<x-app-layout>

    <x-slot name="header">
        <div class="text-xl">Vista de Crear Imagenes</div>
    </x-slot>

    {{-- este seria el slot principal --}}
    {{-- <div class="container mx-20 my-5"> --}}
        <h1>Subir imagenes</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.files.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Subir imagenes</button>
                </form>
            </div>    
        </div>
   {{--  </div> --}}


</x-app-layout>