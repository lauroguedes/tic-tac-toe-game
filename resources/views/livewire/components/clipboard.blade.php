<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $text = '';
}; ?>

<button data-clipboard-text="{{ $text }}"
        class="copy-button underline underline-offset-4 decoration-2 decoration-wavy decoration-red-700 hover:opacity-60 uppercase text-blue-700">Share
</button>

@script
<script>
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
