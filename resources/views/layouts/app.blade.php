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
    <body class="font-sans text-gray-900 antialiased caveat-font">
        <div class="min-h-screen grid grid-cols-1 grid-flow-row bg-gray-100 content-between m-0 py-6">
            <header class="flex justify-center items-center">
                <a href="/" wire:navigate>
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500 -skew-x-12 opacity-40" />
                </a>
            </header>

            <main class="notebook-container col-span-2 bg-white mx-8 md:w-[500px] md:h-[600px] p-8 rounded-md place-self-center flex flex-col justify-center items-center overflow-hidden">
                {{ $slot }}
            </main>

            <footer class="text-center">
                <div class="text-gray-400 flex justify-center">
                    <span class="px-1">Crafted by an Artisan <a href="https://lauroguedes.dev" target="_blank" class="underline underline-offset-1 hover:text-gray-600">Lauro Guedes <span class="text-blue-300">:)</span></a></span> |
                    <a href="https://github.com/lauroguedes/tic-tac-toe-game" target="_blank" class="px-1 underline underline-offset-1 hover:text-gray-600">Github Project</a> |
                    <a href="https://buymeacoffee.com/lauroguedes" target="_blank" class="px-1 underline underline-offset-1 hover:text-gray-600">Buy me a coffee</a>
                </div>
            </footer>
        </div>
    </body>
</html>
