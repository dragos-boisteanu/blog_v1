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
        <script src="{{ asset(mix('js/client/app.js')) }}" defer></script>
        <script src="{{ asset(mix('js/dashboard/app.js')) }}" defer></script>

    </head>
    <body>
        <div class="view dashboard-view">
            <nav class="dashboard-side-nav">
                <div class="nav__header">
                    <div class="logo">
                        {{-- LOGO --}}
                    </div>
                    <div class="user">
                        {{-- USERNAME --}}
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a class="nav__link" href="{{route('dashboard.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <div>
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="{{route('admin-post.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                            <div>
                                Posts
                            </div>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="{{route('admin-user.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 5v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.11 0-2 .9-2 2zm12 4c0 1.66-1.34 3-3 3s-3-1.34-3-3 1.34-3 3-3 3 1.34 3 3zm-9 8c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1H6v-1z"/>
                            </svg>
                            <div>
                                Users
                            </div>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="{{route('admin-category.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                                <g>
                                    <rect fill="none" height="24" width="24"/>
                                    <path d="M20,6h-8l-2-2H4C2.9,4,2.01,4.9,2.01,6L2,18c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8C22,6.9,21.1,6,20,6z M14,16H6v-2h8V16z M18,12H6v-2h12V12z"/>
                                </g>
                            </svg>
                            <div>
                                Categories
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="darshboard__content">
                <header>
                    <div class="header__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                            <g>
                                <path d="M0,0h24v24H0V0z" fill="none"/>
                                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                            </g>
                        </svg>
                    </div>
                </header>
                <main class="view__body">
                    <div>
                        {{ $breadcrumb }}
                    </div>    
                    <div class="content">
                        {{ $slot }}
                    </div>
                </main>
            </div>
            
        </div>
    </body>
</html>
