<div class="w-full" x-data="{
    cursors: @entangle('mousePositions'),
    smoothCursors: {},
    cursorSpeed: 0.1,
    init() {
        this.$watch('cursors', (value) => {
            this.updateSmoothCursors(value);
        });
        this.animateCursors();
    },
    updateSmoothCursors(newCursors) {
        for (let userId in this.smoothCursors) {
            if (!newCursors[userId]) {
                delete this.smoothCursors[userId];
            }
        }
        for (let userId in newCursors) {
            if (!this.smoothCursors[userId] && newCursors[userId]) {
                this.smoothCursors[userId] = { ...newCursors[userId], active: true };
            } else if (this.smoothCursors[userId] && newCursors[userId]) {
                this.smoothCursors[userId].active = true;
            }
        }
    },
    animateCursors() {
        for (let userId in this.smoothCursors) {
            if (this.cursors[userId] && this.smoothCursors[userId].active) {
                let target = this.cursors[userId];
                let current = this.smoothCursors[userId];

                current.x += (target.x - current.x) * this.cursorSpeed;
                current.y += (target.y - current.y) * this.cursorSpeed;
            }
        }
        requestAnimationFrame(() => this.animateCursors());
    }
}">
    <template x-for="(position, userId) in smoothCursors" :key="userId">
        <div class="cursor-dot" x-show="position.active"
             :style="`left: calc(50% + ${position.x * 50}%);
                      top: calc(50% + ${position.y * 50}%);
                      background-color: ${$wire.userColors[userId] || '#000000'};`"
        >
            <span class="text-4xl text-gray-900/50">{{ $symbol }}</span>
        </div>
    </template>
    @error('socket')
        <div class="flex flex-col justify-center items-center absolute top-0 left-0 z-10 h-full w-full text-center align-middle bg-red-600/60 backdrop-blur-md text-red-100 p-5">
            <h1 class="text-4xl font-bold">{{ $message }}</h1>
            <p class="text-2xl mt-2">Please restart the game and try
                again.</p>
            <a href="{{ route('game.home') }}" wire:navigate class="p-3 text-xl text-white hover:opacity-70">( x ) Restart Game
            </a>
        </div>
    @enderror
    <livewire:components.board :gameKey="$gameKey"/>
</div>
