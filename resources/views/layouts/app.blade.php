<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> este funciona sin problemas--}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">    {{-- supuestamente va este --}}
        @if (isset($mi_css))
            {{ $mi_css }}   {{--slot para definir estilos desde plantillas. Es para que funcione Dropzone --}}
        @endif

        @livewireStyles

        <!-- Scripts. En este caso lo agregue abajo en el body para poder asignarle nombre de seccion y utilizarlo en cualquier plantilla -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> este funciona sin problemas--}} 
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}    {{-- supuestamente va este --}}

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!--Scripts lo pongo aca para poder luego ejecutar el slot 'mi_js' desde cualquier plantilla. Le saco el
        parametro 'defer' que hacia que automaticamente se coloque aqui. Es para que funcione Dropzone-->
        {{-- <script src="{{ asset('js/app.js') }}"></script> este funciona sin problemas--}} 
        <script src="{{ mix('js/app.js') }}"></script>    {{-- supuestamente va este --}}
        @if (isset($mi_js))
            {{ $mi_js }}        {{-- slot para ejecutar scripts desde cualquier plantilla --}}
        @endif

    </body>
</html>
