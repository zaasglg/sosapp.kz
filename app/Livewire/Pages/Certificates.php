<?php

namespace App\Livewire\Pages;

use App\Models\Certificate;
use Livewire\Component;

class Certificates extends Component
{
    public $selectedCategory = 'all';

    public function render()
    {
        $query = Certificate::active()->ordered();

        if ($this->selectedCategory !== 'all') {
            $query->byCategory($this->selectedCategory);
        }

        $certificates = $query->get();

        return view('livewire.pages.certificates', [
            'certificates' => $certificates,
            'categories' => [
                'all' => 'Барлығы',
                'course' => 'Курстар',
                'seminar' => 'Семинарлар',
                'workshop' => 'Шеберханалар',
                'conference' => 'Конференциялар',
                'achievement' => 'Жетістіктер'
            ]
        ]);
    }
}
