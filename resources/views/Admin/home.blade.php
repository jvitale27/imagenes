{{-- evitamos la vista welcome y llamamos directamente el componente de la pantalla principal --}}
<x-app-layout>

    <x-slot name="header">
        Bienvenido a la vista de Administrador
    </x-slot>

    {{-- este seria el slot principal --}}
    <br>
    ADMIN\HOME.BLADE.PHP
    <br>
    ESTE ES EL SLOT PRINCIPAL.
    <br>
    AQUI IRIA TODO EL CONTENIDO DE MI PAGINA PRINCIPAL.

</x-app-layout>