<?php

namespace App\Livewire;

use App\Models\BusinessTrip;
use Livewire\Component;

class BusinessTripViewer extends Component
{
    public $businessTripId;
    public $businessTrip;

    public function mount($businessTripId)
    {
        $this->businessTripId = $businessTripId;
        $this->businessTrip = BusinessTrip::with("galleryItems")->findOrFail(
            $businessTripId
        );
    }

    public function render()
    {
        return view("livewire.business-trip-viewer", [
            "businessTrip" => $this->businessTrip,
        ]);
    }
}
