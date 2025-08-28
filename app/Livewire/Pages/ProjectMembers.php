<?php

namespace App\Livewire\Pages;

use App\Models\ProjectMember;
use Livewire\Component;

class ProjectMembers extends Component
{
    public $selectedStatus = 'all';
    public $selectedDepartment = 'all';
    public $searchTerm = '';

    public function render()
    {
        $query = ProjectMember::active()->ordered();

        // Фильтр по статусу
        if ($this->selectedStatus !== 'all') {
            $query->where('status', $this->selectedStatus);
        }

        // Фильтр по отделу
        if ($this->selectedDepartment !== 'all') {
            $query->where('department', $this->selectedDepartment);
        }

        // Поиск
        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('full_name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('position', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('specialization', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $members = $query->get();
        $featuredMembers = ProjectMember::active()->featured()->ordered()->get();

        // Получаем уникальные отделы для фильтра
        $departments = ProjectMember::active()
            ->whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->sort()
            ->prepend('Барлығы', 'all')
            ->toArray();

        return view('livewire.pages.project-members', [
            'members' => $members,
            'featuredMembers' => $featuredMembers,
            'departments' => $departments,
            'statuses' => [
                'all' => 'Барлығы',
                'active' => 'Белсенді',
                'inactive' => 'Белсенді емес',
                'alumni' => 'Түлектер'
            ]
        ]);
    }
}
