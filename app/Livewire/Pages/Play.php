<?php

namespace App\Livewire\Pages;

use App\Events\MouseMoved;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class Play extends Component
{
    public string $gameKey;

    public ?string $gameId = null;

    public ?string $symbol = null;

    #[Locked]
    public string $userId;

    #[Locked]
    public array $mousePositions = [];

    #[Locked]
    public array $userColors = [];

    public function generateRandomColor(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public function mount(string $gameKey = null): void
    {
        if (!session()->has('player')) {
            session()->put('player', [
                'id' => str()->of(str()->ulid())->lower(),
                'symbol' => $gameKey ? 'O' : 'X',
            ]);
        }

        $this->gameKey = $gameKey ?? session('player')['id'];

        if (!$gameKey) {
            Cache::forever($this->gameKey, uniqid('game_', true));
        }

        $this->gameId = Cache::get($this->gameKey);

        $this->userId = session('player')['id'] . '_' . $this->gameId;

        $this->userColors[$this->userId] = $this->generateRandomColor();
    }

    #[On('echo:mouse-movement.{gameId},MouseMoved')]
    public function onMouseMoved(array $payload): void
    {
        if ($payload['position'] !== null) {
            $this->mousePositions[$payload['userId']] = $payload['position'];
            if (!isset($this->userColors[$payload['userId']])) {
                $this->userColors[$payload['userId']] = $this->generateRandomColor();
            }

            $this->symbol = $payload['symbol'];
        } else {
            unset($this->mousePositions[$payload['userId']]);
        }
    }

    public function moveMouse(array $position): void
    {
        $payload = [
            'userId' => $this->userId,
            'position' => $position,
            'symbol' => session('player')['symbol'],
            'color' => $this->userColors[$this->userId],
        ];

        broadcast(new MouseMoved($payload, $this->gameId))->toOthers();
    }

    public function setInactive(): void
    {
        unset($this->mousePositions[$this->userId]);

        broadcast(
            new MouseMoved([
                'userId' => $this->userId,
                'position' => null,
                'symbol' => null,
                'color' => null,
            ], $this->gameId)
        )->toOthers();
    }

    public function render()
    {
        return view('livewire.pages.play');
    }
}
