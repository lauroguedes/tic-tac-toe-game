<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $text = '';
}; ?>

<button id="copyButton" data-clipboard-text="{{ $text }}"
        class="caveat-font underline hover:opacity-60 underline-offset-2 uppercase text-blue-700">Share
</button>

@script
<script>
    const clipboard = new ClipboardJS('#copyButton');

    clipboard.on('success', function (e) {
        e.trigger.classList.add('text-green-700');
        e.trigger.innerText = 'Copied';

        setTimeout(() => {
            e.trigger.classList.remove('text-green-700');
            e.trigger.innerText = 'Share';
        }, 500);
    });
</script>
@endscript
