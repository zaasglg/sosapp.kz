<div class="fixed bottom-4 right-4 z-50">
    {{-- Кнопка открытия чата --}}
    @if (!$isOpen)
        <button wire:click="toggleChat"
            class="p-4 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition">
            💬
        </button>
    @endif

    {{-- Окно чата --}}
    @if($isOpen)
        <div class="mt-2 w-80 h-96 bg-white shadow-lg rounded-lg p-4 flex flex-col">
            <div class="flex justify-between items-center border-b pb-2">
                <h2 class="text-lg font-semibold">Чат-бот</h2>
                <button wire:click="toggleChat" class="text-gray-600 hover:text-gray-900">✖</button>
            </div>

            <div class="flex-1 p-2 overflow-y-auto">
                @foreach($messages as $msg)
                    <div class="p-2 my-1 rounded 
                        {{ $msg['role'] === 'user' ? 'bg-blue-200 text-right' : 'bg-gray-200 text-left' }}">
                        {{ $msg['text'] }}
                    </div>
                @endforeach

                @if($loading)
                    <div class="text-center text-gray-500 mt-2">Жүктелуде...</div>
                @endif
            </div>

            {{-- Поле ввода + кнопка отправки --}}
            <div class="flex items-center mt-2 space-x-2">
                <input wire:model.live="message" wire:keydown.enter="sendMessage"
                    type="text" placeholder="Введите сообщение..."
                    class="flex-1 p-2 border rounded">

                <button wire:click="sendMessage"
                    class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                    @disabled(empty($message))>
                    <!-- Иконка самолётика -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-45"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 19l9 2-9-18-9 18 9-2z" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
</div>
