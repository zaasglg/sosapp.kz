<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookViewer extends Component
{
    public $bookId;
    public $book;

    public function mount($bookId)
    {
        $this->bookId = $bookId;
        $this->book = Book::findOrFail($bookId);
    }

    public function render()
    {
        return view("livewire.book-viewer", [
            "book" => $this->book,
        ]);
    }
}
