<?php

namespace App\Livewire;

use App\Models\SportEvent;
use Livewire\Component;

class SportEventViewer extends Component
{
    public $eventId;
    public $event;
    public $currentImageIndex = 0;
    public $showImageModal = false;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
        $this->loadEvent();
    }

    public function loadEvent()
    {
        $this->event = SportEvent::with([
            "galleryItems" => function ($query) {
                $query->orderBy("sort_order")->orderBy("created_at");
            },
        ])->findOrFail($this->eventId);
    }

    public function openImageModal($index)
    {
        // Debug log
        logger("Opening image modal with index: " . $index);
        
        // Handle cover image (index -1) or gallery images (0, 1, 2, ...)
        if ($index === -1) {
            // If it's the cover image, set to show it
            $this->currentImageIndex = -1;
        } else {
            // Regular gallery image
            $this->currentImageIndex = $index;
        }
        $this->showImageModal = true;
        
        // Force re-render
        $this->dispatch('image-modal-opened');
    }

    public function closeImageModal()
    {
        $this->showImageModal = false;
        $this->dispatch('image-modal-closed');
    }

    public function nextImage()
    {
        $totalImages = $this->event->galleryItems->count();
        $hasCover = $this->event->main_image ? true : false;
        
        // If only one image total (either cover or single gallery item), do nothing
        if (($totalImages + ($hasCover ? 1 : 0)) <= 1) {
            return;
        }
        
        if ($this->currentImageIndex === -1) {
            // From cover image to first gallery image
            if ($totalImages > 0) {
                $this->currentImageIndex = 0;
            }
        } else {
            // Navigate through gallery images
            if ($this->currentImageIndex < $totalImages - 1) {
                $this->currentImageIndex++;
            } else {
                // Go back to cover if it exists, otherwise to first gallery image
                if ($hasCover) {
                    $this->currentImageIndex = -1;
                } else {
                    $this->currentImageIndex = 0;
                }
            }
        }
        
        $this->dispatch('image-navigation', ['direction' => 'next', 'index' => $this->currentImageIndex]);
    }

    public function previousImage()
    {
        $totalImages = $this->event->galleryItems->count();
        $hasCover = $this->event->main_image ? true : false;
        
        // If only one image total, do nothing
        if (($totalImages + ($hasCover ? 1 : 0)) <= 1) {
            return;
        }
        
        if ($this->currentImageIndex === -1) {
            // From cover image to last gallery image
            if ($totalImages > 0) {
                $this->currentImageIndex = $totalImages - 1;
            }
        } else if ($this->currentImageIndex === 0) {
            // From first gallery image
            if ($hasCover) {
                $this->currentImageIndex = -1;
            } else {
                $this->currentImageIndex = $totalImages - 1;
            }
        } else {
            // Normal navigation through gallery
            $this->currentImageIndex--;
        }
        
        $this->dispatch('image-navigation', ['direction' => 'previous', 'index' => $this->currentImageIndex]);
    }

    public function participateInEvent()
    {
        // TODO: Implement participation logic
        session()->flash('message', 'Іс-шараға тіркелу функциясы әзірлеу кезеңінде');
    }

    public function render()
    {
        return view("livewire.sport-event-viewer", [
            "event" => $this->event,
        ]);
    }
}
