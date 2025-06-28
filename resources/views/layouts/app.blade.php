<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col items-center py-4 font-sans text-gray-900 antialiased caveat-font">
            <header class="flex w-full justify-center items-center">
                <a href="/" wire:navigate>
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500 -skew-x-12 opacity-40" />
                </a>
            </header>

            <main class="grow w-full flex flex-col justify-center items-center p-5">
                <div class="notebook-container">
                    {{ $slot }}
                </div>
            </main>

            <footer class="w-full text-center">
                <div class="text-gray-400 flex justify-center">
                    <span class="px-1">Crafted by an Artisan <a href="https://lauroguedes.dev" target="_blank" class="underline underline-offset-1 hover:text-gray-600">Lauro Guedes <span class="text-blue-300">:)</span></a></span> |
                    <a href="https://github.com/lauroguedes/tic-tac-toe-game" target="_blank" class="px-1 underline underline-offset-1 hover:text-gray-600">Github Project</a> |
                    <a href="https://buymeacoffee.com/lauroguedes" target="_blank" class="px-1 underline underline-offset-1 hover:text-gray-600">Buy me a coffee</a>
                </div>
            </footer>
    </body>
</html>
