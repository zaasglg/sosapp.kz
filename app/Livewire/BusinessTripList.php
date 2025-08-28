<?php

namespace App\Livewire;

use App\Models\BusinessTrip;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessTripList extends Component
{
    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = BusinessTrip::with("galleryItems")->when(
            $this->search,
            function ($query) {
                $query
                    ->where("name", "like", "%" . $this->search . "%")
                    ->orWhere("description", "like", "%" . $this->search . "%");
            }
        );

        $businessTrips = $query->orderBy("created_at", "desc")->paginate(12);

        return view("livewire.business-trip-list", [
            "businessTrips" => $businessTrips,
        ]);
    }
}
