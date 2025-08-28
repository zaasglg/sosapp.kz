<?php

namespace App\Livewire;

use App\Models\GalleryItem;
use App\Models\BusinessTrip;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;

    public $search = "";
    public $category = "";
    public $featuredOnly = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingFeaturedOnly()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = GalleryItem::with("businessTrip")
            ->when($this->search, function ($query) {
                $query
                    ->where("title", "like", "%" . $this->search . "%")
                    ->orWhere("description", "like", "%" . $this->search . "%");
            })
            ->when($this->category, function ($query) {
                $query->where("category", $this->category);
            })
            ->when($this->featuredOnly, function ($query) {
                $query->where("is_featured", true);
            });

        $items = $query->ordered()->paginate(15);

        $categories = GalleryItem::distinct()
            ->whereNotNull("category")
            ->pluck("category")
            ->filter()
            ->sort();

        return view("livewire.gallery", [
            "items" => $items,
            "categories" => $categories,
        ]);
    }
}
