<?php

namespace App\Livewire;

use App\Models\Seminar;
use Livewire\Component;
use Livewire\WithPagination;

class SeminarList extends Component
{
    use WithPagination;

    public $search = "";
    public $category = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Seminar::with("galleryItems")->when($this->search, function (
            $query
        ) {
            $query
                ->where("name", "like", "%" . $this->search . "%")
                ->orWhere("description", "like", "%" . $this->search . "%");
        });

        // Apply category filter if set
        if ($this->category) {
            $query->whereHas("galleryItems", function ($q) {
                $q->where("category", $this->category);
            });
        }

        $seminars = $query->orderBy("created_at", "desc")->paginate(12);

        return view("livewire.seminar-list", [
            "seminars" => $seminars,
        ]);
    }
}
