<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public bool $isBlackWhite;

    public function mount()
    {
        $this->isBlackWhite = session('isBlackWhite', false);
    }

    public function toggleBlackWhite()
    {
        $this->isBlackWhite = !$this->isBlackWhite;
        session(['isBlackWhite' => $this->isBlackWhite]);
        return redirect()->to(request()->header('Referer', url('/')));
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
