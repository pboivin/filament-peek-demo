@props([
    'title' => '',
    'siteName' => config('app.name'),
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ? "$title — " : '' }}{{ config('app.name') }}</title>

        @vite(['resources/css/app.css'])

        @livewireStyles
    </head>
    <body class="bg-white">
        <div class="flex flex-col min-h-screen">
            <header class="bg-black text-white">
                <x-container>
                    <nav class="main-nav flex items-center">
                        @if ($siteName)
                            <div class="text-2xl">
                                <a href="/">{{ $siteName }}</a>
                            </div>
                        @endif

                        <x-menu name="main" />
                    </nav>
                </x-container>
            </header>

            <main>
                {!! $slot ?? '' !!}
            </main>

            <div class="mt-16"></div>

            <footer class="mt-auto text-center">
                <x-container class="text-gray-700">
                    <div class="flex flex-col lg:flex-row items-center justify-center space-x-4">
                        <span>Copyright © {{ date('Y') }} ACME inc.</span>
                        <x-menu name="footer" />
                    </div>
                </x-container>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
