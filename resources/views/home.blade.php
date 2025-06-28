<x-app-layout>
    <div class="w-full lg:w-2/3 text-center">
        <p class="text-3xl lg:text-4xl mb-3 text-gray-900">Come have fun with <span class="text-red-700 underline underline-offset-4 decoration-2 decoration-wavy decoration-blue-700">tic-tac-toe</span> and show that you can beat your opponent with smart moves!</p>
        <a href="{{ route('game.play') }}"
           class="text-blue-700 py-2 px-4 text-4xl underline underline-offset-4 decoration-2 decoration-wavy decoration-red-700 hover:text-red-700">
            Start Game
        </a>
    </div>
{{--    <livewire:components.mouse-movement/>--}}
</x-app-layout>
