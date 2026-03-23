<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-white">
        <div class="flex flex-col min-h-screen">
            <main>
                {!! $slot ?? '' !!}
            </main>
        </div>
    </body>
</html>
