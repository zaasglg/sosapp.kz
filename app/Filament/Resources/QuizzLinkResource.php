<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizzLinkResource\Pages;
use App\Models\QuizzLink;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class QuizzLinkResource extends Resource
{
    protected static ?string $model = QuizzLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ссылки на викторины';

    protected static ?string $pluralLabel = 'Ссылки на викторины';

    protected static ?string $modelLabel = 'Ссылка на викторину';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->placeholder('Введите название викторины'),
                Textarea::make('description')
                    ->label('Описание')
                    ->placeholder('Введите описание викторины'),
                FileUpload::make('image')
                    ->label('Изображение')
                    ->image()
                    ->disk('public')
                    ->directory('quizz-images'),
                TextInput::make('url')
                    ->label('Ссылка')
                    ->url()
                    ->required()
                    ->placeholder('Введите ссылку на викторину'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->label('Ссылка')
                    ->searchable(),
            ])
            ->filters([
                // Добавьте фильтры, если нужно
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Редактировать'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Удалить выбранное'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Добавьте связи, если нужно
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzLinks::route('/'),
            'create' => Pages\CreateQuizzLink::route('/create'),
            'edit' => Pages\EditQuizzLink::route('/{record}/edit'),
        ];
    }
}
