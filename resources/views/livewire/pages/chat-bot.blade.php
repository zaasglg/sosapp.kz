<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>
    
    <section class="py-12 w-9/12 mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="font-bold">Жасанды интелектке Чат-Бот, кез-келген көмек сұрай аласыз</h2>
            <div class="p-4 border rounded bg-gray-100 h-64 overflow-y-auto space-y-2 mt-5">
                @foreach($messages as $message)
                    <div class="flex {{ $message['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                        <div class="p-3 max-w-xs rounded-lg {{ $message['role'] === 'user' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-900' }}">
                            <strong>{{ $message['role'] === 'user' ? 'Сіз' : 'Бот' }}:</strong>
                            {{ $message['content'] }}
                        </div>
                    </div>
                @endforeach
                
                <div wire:loading class="text-center mt-2">
                    <span class="animate-spin border-4 border-blue-500 border-t-transparent rounded-full w-6 h-6 inline-block"></span>
                </div>
            </div>
        
            <div class="mt-2 flex items-center border rounded-lg overflow-hidden">
                <input type="text" class="w-full p-2 border-none focus:outline-none" wire:model="userMessage" wire:keydown.enter="sendMessage" placeholder="Хабарлама жазыңыз...">
                <button class="p-2 bg-blue-500 text-white flex items-center justify-center" wire:click="sendMessage">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l9-9m0 0l9 9m-9-9v14" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
</main>
