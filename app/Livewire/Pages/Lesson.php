<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\VideoLesson; // Подключаем модель

class Lesson extends Component
{
    public $videoLessons; // Свойство для хранения данных

    public function mount()
    {
        // Получаем данные из базы данных
        $this->videoLessons = VideoLesson::all();
    }

    public function render()
    {
        // Передаем данные в представление
        return view('livewire.pages.lesson', [
            'videoLessons' => $this->videoLessons,
        ]);
    }
}
