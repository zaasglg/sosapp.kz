<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoLessonResource\Pages;
use App\Models\VideoLesson;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideoLessonResource extends Resource
{
    protected static ?string $model = VideoLesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Видео уроки';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Контент';
    }

    public static function getModelLabel(): string
    {
        return 'Видео урок';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Видео уроки';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('video_url')
                    ->label('Видео файл')
                    ->disk('public')
                    ->directory('videos')
                    ->required(),

                DatePicker::make('created_at')
                    ->label('Дата создания')
                    ->disabled(),

                DatePicker::make('updated_at')
                    ->label('Дата обновления')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime(),

                TextColumn::make('updated_at')
                    ->label('Дата обновления')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideoLessons::route('/'),
            'create' => Pages\CreateVideoLesson::route('/create'),
            'edit' => Pages\EditVideoLesson::route('/{record}/edit'),
        ];
    }
}
