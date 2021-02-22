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
        <link href="{{ asset(mix('css/dashboard/app.css')) }}" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script src="{{ asset(mix('js/client/app.js')) }}" defer></script>
        <script src="{{ asset(mix('js/dashboard/app.js')) }}" defer></script>

    </head>
    <body>
        <div class="view dashboard-view">
            @include('includes.dashboard.side-nav')
            <div class="darshboard__content">
                @include('includes.dashboard.header')
                <main class="view__body">   
                        
                    @if (Session::has('info'))
                        <x-notification type="info" message="{{ Session('info') }}"></x-notification>
                    @endif         

                    @yield('breadcrumbs')
                       
                    <div class="content">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
