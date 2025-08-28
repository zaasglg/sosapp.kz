<?php

namespace App\Livewire;

use App\Models\ProfessionalDevelopment as ProfessionalDevelopmentModel;
use Livewire\Component;

class ProfessionalDevelopmentViewer extends Component
{
    public $development;
    public $developmentId;

    public function mount($id)
    {
        $this->developmentId = $id;
        $this->development = ProfessionalDevelopmentModel::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.professional-development-viewer');
    }
}
