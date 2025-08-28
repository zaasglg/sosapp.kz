<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    // Указываем модель, с которой будет работать ресурс
    protected static ?string $model = Category::class;

    // Иконка для навигации в панели управления
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Заголовок для навигационного меню
    public static function getNavigationLabel(): string
    {
        return 'Категории'; // Заголовок на русском
    }

    // Имя группы для навигационного меню
    public static function getNavigationGroup(): ?string
    {
        return 'Контент'; // Имя группы на русском
    }

    // Главный заголовок ресурса в единственном числе
    public static function getModelLabel(): string
    {
        return 'Категория'; // Название ресурса в единственном числе
    }

    // Главный заголовок ресурса во множественном числе
    public static function getPluralModelLabel(): string
    {
        return 'Категории'; // Название ресурса во множественном числе
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Поле для ввода названия категории
                Forms\Components\TextInput::make('name')
                    ->label('Название') // Метка на русском
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Колонка для отображения названия категории
                Tables\Columns\TextColumn::make('name')
                    ->label('Название') // Метка на русском
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
