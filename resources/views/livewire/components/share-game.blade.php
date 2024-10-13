<?php

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\Result\ResultInterface;
use Livewire\Volt\Component;

new class extends Component {
    public string $endpoint = '';

    public function mount(string $gameKey): void
    {
        $this->endpoint = route('game.play', $gameKey);
    }

    public function generateQrCode(): ResultInterface
    {
        return Builder::create()
            ->data($this->endpoint)
            ->size(200)
            ->margin(10)
            ->build();
    }
}; ?>

<div class="caveat-font flex flex-col justify-center items-center text-center">
    <div class="font-bold text-4xl mb-3">Share with your friend and play together :)</div>
    <div class="flex justify-center items-center text-3xl space-x-4">
        <livewire:components.clipboard :text="$endpoint"/>
    </div>
    <img src="{{ $this->generateQrCode()->getDataUri() }}" alt="QR Code" class="mt-5">
</div>
