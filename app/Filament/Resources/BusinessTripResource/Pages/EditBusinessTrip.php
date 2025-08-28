<?php

namespace App\Filament\Resources\BusinessTripResource\Pages;

use App\Filament\Resources\BusinessTripResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBusinessTrip extends EditRecord
{
    protected static string $resource = BusinessTripResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()->label("Жою")];
    }

    public function getTitle(): string
    {
        return "Іссапарды өзгерту";
    }
}
