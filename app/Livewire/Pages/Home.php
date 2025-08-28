<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts = [];

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
