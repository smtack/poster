<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}">
        <meta name="msapplication-TileColor" content="#2b5797">
        <meta name="theme-color" content="#ffffff">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-indigo-600 selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <div class="flex flex-col items-start gap-6 rounded-lg sm:pb-6 md:row-span-3 lg:p-10 lg:pb-10">
                                <x-application-logo class="sm:h-64 lg:h-96" />
                            </div>

                            <a
                                href="{{ route('register') }}"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] outline-none transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-hidden focus-visible:ring-indigo-600 lg:pb-10"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-indigo-600/10 sm:size-16">
                                    <img class="size-5 sm:size-6" src="{{ asset('images/icons/register.svg') }}" alt="Register">
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Sign Up</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Make an account and start making posts.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center block ml-auto stroke-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <a
                                href="{{ route('login') }}"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-hidden focus-visible:ring-indigo-600 lg:pb-10"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-indigo-600/10 sm:size-16">
                                    <img class="size-5 sm:size-6" src="{{ asset('images/icons/login.svg') }}" alt="Register">
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Log In</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Already have an account. Log In.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center block ml-auto stroke-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        &copy; {{ env('APP_NAME') }} {{ Date('Y') }}
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
