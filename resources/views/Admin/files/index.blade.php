{{-- instancio al componente 'app-layout' en App\View\Components\AppLayout.php que renderiza la view 'layouts.app' en view\layouts\app.blade.php --}}
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
                        <div class="grid grid-cols-2 w-40 gap-4 mb-4">
                            <a href="{{ route('admin.files.edit', $file) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">Editar</a>
                            {{-- le doy un nombre al formulario para captar el evento desde el script --}}
                            <form action="{{ route('admin.files.destroy', $file) }}" class="formulario-eliminar" method="POST">
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


    <x-slot name="mi_js">

        {{-- CDN de cualquier cuadro de dialog desde https://sweetalert2.github.io/ --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        {{-- capto el mansaje de session y aviso que ya se elimino con exito utilizando sweetalert2 --}}
        @if (session('info'))
            <script>
                Swal.fire(
                   'Eliminado!',
                   'Elemento eliminado',
                   'success'                    {{-- icono --}}
                )
            </script>
        @endif

        {{-- include jquery porque no lo tenia. la carpeta vendor\jquery\ la copio desde otro proyecto --}}
        {{-- lo incluyo directamente en layouts/app.blade.php para tenerlo disponible para todos --}}
        {{-- <script src="{{ asset('vendor/jquery/jquery.js') }}"></script> --}}

        <script>
            {{-- capturo el evento de envio del formulario 'formulario-eliminar' --}}
            $('.formulario-eliminar').submit( function( event ) {  {{-- el evento esta en la vble event --}}

                event.preventDefault();     {{-- detengo el envio del formulario --}}

                {{-- cartel de alerta extraido de https://sweetalert2.github.io/ --}}
                Swal.fire({
                  title: 'Esta seguro?',
                  text: "Esta accion no se podrá revertir!",
                  icon: 'warning',                              {{-- icono --}}
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, eliminarlo!',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.isConfirmed) {
/*                    Swal.fire(
                      'Eliminado!',
                      'Elemento eliminado',
                      'success'
                    )*/
                    this.submit();        //prosigo con el envio del formulario llamado 'formulario-eliminar'
                  }
                })
            });
        </script>

    </x-slot>

</x-app-layout>

