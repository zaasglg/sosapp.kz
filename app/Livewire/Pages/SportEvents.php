<?php

namespace App\Livewire\Pages;

use App\Models\SportEvent;
use Livewire\Component;

class SportEvents extends Component
{
    public $selectedType = 'all';
    public $selectedStatus = 'all';

    public function render()
    {
        $query = SportEvent::active()->ordered();

        if ($this->selectedType !== 'all') {
            $query->byType($this->selectedType);
        }

        if ($this->selectedStatus === 'upcoming') {
            $query->upcoming();
        } elseif ($this->selectedStatus === 'past') {
            $query->past();
        }

        $events = $query->get();

        return view('livewire.pages.sport-events', [
            'events' => $events,
            'types' => [
                'all' => 'Барлығы',
                'tournament' => 'Турнирлер',
                'competition' => 'Жарыстар',
                'marathon' => 'Марафондар',
                'training' => 'Жаттығулар',
                'championship' => 'Чемпионаттар',
                'festival' => 'Фестивальдар',
                'workshop' => 'Шеберханалар'
            ],
            'statusFilters' => [
                'all' => 'Барлығы',
                'upcoming' => 'Болашақ',
                'past' => 'Өткен'
            ]
        ]);
    }
}
