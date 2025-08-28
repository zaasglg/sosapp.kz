<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScienceResource\Pages;
use App\Models\Science;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScienceResource extends Resource
{
    protected static ?string $model = Science::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Научные ресурсы';

    protected static ?string $pluralLabel = 'Научные ресурсы';

    protected static ?string $modelLabel = 'Научный ресурс';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->placeholder('Введите название ресурса'),
                FileUpload::make('docuent_link')
                    ->label('Ссылка на документ')
                    ->disk('public')
                    ->label('Загрузить документ'),
                DatePicker::make('created_at')
                    ->label('Дата создания')
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
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListSciences::route('/'),
            'create' => Pages\CreateScience::route('/create'),
            'edit' => Pages\EditScience::route('/{record}/edit'),
        ];
    }
}
