<?php

namespace App\Filament\Resources\VideoLessonResource\Pages;

use App\Filament\Resources\VideoLessonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideoLesson extends EditRecord
{
    protected static string $resource = VideoLessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
