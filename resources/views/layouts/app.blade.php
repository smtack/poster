<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ config('app.name') }}

            @isset($title)
                {{ ' - ' . $title }}
            @endisset
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}">
        <meta name="msapplication-TileColor" content="#2b5797">
        <meta name="theme-color" content="#ffffff">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased selection:bg-indigo-600 selection:text-white">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="py-4 text-sm text-gray-600 dark:text-white/70">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="float-left">&copy; {{ config('app.name') }} {{ Date('Y') }}</p>
                    <p class="float-right">
                        <a href="{{ route('lang', 'en') }}">EN</a>
                            &#10072;
                        <a href="{{ route('lang', 'fr') }}">FR</a>
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
