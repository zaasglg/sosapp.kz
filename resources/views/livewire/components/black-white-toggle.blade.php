<div>
    <button 
        wire:click="toggleBlackWhite" 
        class="px-4 py-2 bg-gray-800 text-white rounded-lg"
    >
        {{ $isBlackWhite ? 'Выключить Ч/Б' : 'Включить Ч/Б' }}
    </button>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', (message, component) => {
                if (@json($isBlackWhite)) {
                    document.documentElement.classList.add('grayscale');
                } else {
                    document.documentElement.classList.remove('grayscale');
                }
            });
        });
    </script>
</div>
