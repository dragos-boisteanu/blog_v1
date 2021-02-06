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
        <link href="{{ asset(mix('css/client/app.css')) }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset(mix('js/client/app.js')) }}" defer></script>
    </head>
    <body>
        <div class="view">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- <header>
              
            </header> --}}

            <!-- Page Content -->
            <main>
                <div class="view__title">
                    {{ $title }}
                </div>    
                <div class="view__content">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
