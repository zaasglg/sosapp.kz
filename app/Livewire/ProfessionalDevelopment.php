<?php

namespace App\Livewire;

use App\Models\ProfessionalDevelopment as ProfessionalDevelopmentModel;
use Livewire\Component;

class ProfessionalDevelopment extends Component
{
    public $selectedType = 'all';

    public function render()
    {
        $query = ProfessionalDevelopmentModel::active()->ordered();

        if ($this->selectedType !== 'all') {
            $query->byType($this->selectedType);
        }

        $developments = $query->get();

        return view('livewire.professional-development', [
            'developments' => $developments,
            'types' => [
                'all' => 'Барлығы',
                'course' => 'Курстар',
                'seminar' => 'Семинарлар',
                'workshop' => 'Шеберханалар',
                'conference' => 'Конференциялар'
            ]
        ]);
    }
}
