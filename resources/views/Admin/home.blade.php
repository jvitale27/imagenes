{{-- instancio al componente 'app-layout' en App\View\Components\AppLayout.php que renderiza la view 'layouts.app' en view\layouts\app.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        Vista de Home Administrador
    </x-slot>

    {{-- este seria el slot principal --}}
    <div class="container mx-auto">
        Bienvenidos a la vista de administrador
        <br>
        ADMIN\FILES\HOME.BLADE.PHP
        <br>
    </div>


</x-app-layout>