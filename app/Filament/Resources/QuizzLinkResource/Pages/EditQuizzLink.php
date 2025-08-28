<?php

namespace App\Filament\Resources\QuizzLinkResource\Pages;

use App\Filament\Resources\QuizzLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuizzLink extends EditRecord
{
    protected static string $resource = QuizzLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
