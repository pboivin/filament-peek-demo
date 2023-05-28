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
    <body>
        <div class="flex flex-col min-h-screen">
            <header class="bg-black text-white">
                <x-container>
                    <nav class="main-nav flex items-center">
                        @if ($siteName)
                            <div class="text-2xl">
                                <a href="/">{{ $siteName }}</a>
                            </div>
                        @endif

                        <ul class="ml-auto flex items-center space-x-4">
                            <li><a href="{{ route('post.index') }}">Blog</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </x-container>
            </header>

            <main>
                {!! $slot ?? '' !!}
            </main>

            <div class="mt-16"></div>

            <footer class="mt-auto text-center">
                <x-container class="text-gray-700">
                    Copyright © {{ date('Y') }} ACME inc.
                </x-container>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
