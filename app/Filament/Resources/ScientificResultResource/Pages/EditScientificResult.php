<?php

namespace App\Filament\Resources\ScientificResultResource\Pages;

use App\Filament\Resources\ScientificResultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScientificResult extends EditRecord
{
    protected static string $resource = ScientificResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
