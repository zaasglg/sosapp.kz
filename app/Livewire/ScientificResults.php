<?php

namespace App\Livewire;

use App\Models\ScientificResult;
use Livewire\Component;

class ScientificResults extends Component
{
    public $selectedType = 'all';

    public function render()
    {
        $query = ScientificResult::active()->ordered();

        if ($this->selectedType !== 'all') {
            $query->byType($this->selectedType);
        }

        $results = $query->get();

        return view('livewire.scientific-results', [
            'results' => $results,
            'types' => [
                'all' => 'Барлығы',
                'article' => 'Мақалалар',
                'interview' => 'Сұхбаттар',
                'social_media' => 'Әлеуметтік желілер'
            ]
        ]);
    }
}
