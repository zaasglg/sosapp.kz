<?php

namespace App\Filament\Resources\QuizzLinkResource\Pages;

use App\Filament\Resources\QuizzLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuizzLinks extends ListRecords
{
    protected static string $resource = QuizzLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
