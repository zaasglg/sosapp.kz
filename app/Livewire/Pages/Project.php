<?php

namespace App\Livewire\Pages;

use App\Models\Science; // Подключаем модель Science
use Livewire\Component;

class Project extends Component
{
    public $projects;

    public function mount()
    {
        // Получаем данные из модели Science
        $this->projects = Science::all();
    }

    public function render()
    {
        // Передаем данные в шаблон
        return view('livewire.pages.project', [
            'projects' => $this->projects,
        ]);
    }
}
