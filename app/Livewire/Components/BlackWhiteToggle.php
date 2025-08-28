<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BlackWhiteToggle extends Component
{
    public $isBlackWhite = false;

    public function toggleBlackWhite()
    {
        $this->isBlackWhite = !$this->isBlackWhite;
    }

    public function render()
    {
        return view('livewire.components.black-white-toggle');
    }
}
