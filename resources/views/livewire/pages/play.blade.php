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
        </div>
    </template>
    <livewire:components.board :gameKey="$gameKey"/>
</div>
