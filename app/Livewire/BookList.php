<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookList extends Component
{
    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $books = Book::when($this->search, function ($query) {
            $query
                ->where("name", "like", "%" . $this->search . "%")
                ->orWhere("description", "like", "%" . $this->search . "%")
                ->orWhere("press", "like", "%" . $this->search . "%");
        })->paginate(12);

        return view("livewire.book-list", [
            "books" => $books,
        ]);
    }
}
