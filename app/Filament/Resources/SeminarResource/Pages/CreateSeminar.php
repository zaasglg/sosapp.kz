<?php

namespace App\Filament\Resources\SeminarResource\Pages;

use App\Filament\Resources\SeminarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSeminar extends CreateRecord
{
    protected static string $resource = SeminarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl("index");
    }

    public function getTitle(): string
    {
        return "Создать семинар";
    }
}
