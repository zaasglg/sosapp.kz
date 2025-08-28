<?php

namespace App\Filament\Resources\BusinessTripResource\Pages;

use App\Filament\Resources\BusinessTripResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBusinessTrips extends ListRecords
{
    protected static string $resource = BusinessTripResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()->label("Іссапар қосу")];
    }

    public function getTitle(): string
    {
        return "Іссапарлар";
    }
}
