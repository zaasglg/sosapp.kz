<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ChatAssistant extends Component
{
    public bool $isOpen = false;
    public string $message = '';
    public array $messages = [];
    public bool $loading = false;

    public function toggleChat()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function sendMessage()
    {
        if (empty($this->message)) return;

        // Добавляем сообщение пользователя
        $this->messages[] = ['role' => 'user', 'text' => $this->message];

        $userInput = $this->message;
        $this->message = '';
        $this->loading = true;

        // Формируем сообщения в формате OpenAI
        $formattedMessages = array_map(function ($msg) {
            return [
                'role' => $msg['role'],
                'content' => $msg['text'],
            ];
        }, $this->messages);

        // Отправка запроса к OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'store' => true,
            'messages' => $formattedMessages,
        ]);

        $this->loading = false;

        $data = $response->json();

        // Ответ от бота
        if (isset($data['choices'][0]['message']['content'])) {
            $this->messages[] = [
                'role' => 'assistant',
                'text' => $data['choices'][0]['message']['content'],
            ];
        }
    }

    public function render()
    {
        return view('livewire.components.chat-assistant');
    }
}
