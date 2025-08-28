<?php

namespace App\Filament\Resources\BusinessTripResource\Pages;

use App\Filament\Resources\BusinessTripResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBusinessTrip extends CreateRecord
{
    protected static string $resource = BusinessTripResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl("index");
    }

    public function getTitle(): string
    {
        return "Іссапар қосу";
    }
}
