<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ChatBot extends Component
{
    public $messages = [];
    public $userMessage = '';
    public $loading = false;

    public function sendMessage()
    {
        if (!$this->userMessage) return;

        // Add user's message to chat
        $this->messages[] = ['role' => 'user', 'content' => $this->userMessage];

        // Show loading state
        $this->loading = true;

        // Call OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'store' => true,
            'messages' => $this->messages,
        ]);

        $data = $response->json();

        // Add API response to chat
        if (isset($data['choices'][0]['message']['content'])) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => $data['choices'][0]['message']['content']
            ];
        }

        // Hide loading state
        $this->loading = false;

        // Clear input field
        $this->userMessage = '';
    }

    public function render()
    {
        return view('livewire.pages.chat-bot');
    }
}
