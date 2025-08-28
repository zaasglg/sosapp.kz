<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    // Указываем модель, с которой будет работать ресурс
    protected static ?string $model = Post::class;

    // Иконка для навигации в панели управления
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Заголовок для навигационного меню
    public static function getNavigationLabel(): string
    {
        return 'Посты'; // Заголовок на русском
    }

    // Имя группы для навигационного меню
    public static function getNavigationGroup(): ?string
    {
        return 'Контент'; // Имя группы на русском
    }

    // Главный заголовок ресурса в единственном числе
    public static function getModelLabel(): string
    {
        return 'Пост'; // Название ресурса в единственном числе
    }

    // Главный заголовок ресурса во множественном числе
    public static function getPluralModelLabel(): string
    {
        return 'Посты'; // Название ресурса во множественном числе
    }

    // Определяем форму для создания и редактирования записей
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Поле для ввода заголовка
                TextInput::make('title')
                    ->label('Заголовок') // Метка на русском
                    ->required()
                    ->maxLength(255),

                // Поле для загрузки главного фото
                FileUpload::make('hero')
                    ->disk('public')
                    ->directory('blogs')
                    ->label('Главное фото') // Метка на русском
                    ->image() // Указывает, что это изображение
                    ->required(),

                // Поле для краткого описания
                Textarea::make('exception')
                    ->label('Краткое описание') // Метка на русском
                    ->required()
                    ->maxLength(255),

                // Поле для полного описания
                RichEditor::make('description')
                    ->label('Описание') // Метка на русском
                    ->required(),

                // Поле для выбора категории
                Select::make('category_id')
                    ->label('Категория') // Метка на русском
                    ->relationship('category', 'name') // Связь с моделью Category, отображается поле name
                    ->required(),

                // Поле для отображения даты создания (только для чтения)
                DatePicker::make('created_at')
                    ->label('Дата создания') // Метка на русском
                    ->disabled(),

                // Поле для отображения даты обновления (только для чтения)
                DatePicker::make('updated_at')
                    ->label('Дата обновления') // Метка на русском
                    ->disabled(),
            ]);
    }

    // Определяем таблицу для отображения записей
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Колонка для ID
                TextColumn::make('id')
                    ->label('ID') // Метка на русском
                    ->sortable(),

                // Колонка для заголовка
                TextColumn::make('title')
                    ->label('Заголовок') // Метка на русском
                    ->searchable(),

                
                // Колонка для отображения имени категории
                TextColumn::make('category.name')
                    ->label('Категория'), // Метка на русском

                // Колонка для даты создания
                TextColumn::make('created_at')
                    ->label('Дата создания') // Метка на русском
                    ->dateTime(),

                // Колонка для даты обновления
                TextColumn::make('updated_at')
                    ->label('Дата обновления') // Метка на русском
                    ->dateTime(),
            ])
            ->filters([
                // Здесь можно добавить фильтры
            ])
            ->actions([
                // Действие для редактирования записи
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Групповые действия
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Определяем связи (если есть)
    public static function getRelations(): array
    {
        return [
            // Здесь можно добавить связи
        ];
    }

    // Определяем страницы для ресурса
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
