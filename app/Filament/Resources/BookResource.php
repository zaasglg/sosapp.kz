<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = "heroicon-o-book-open";

    protected static ?string $modelLabel = "Книга";

    protected static ?string $pluralModelLabel = "Книги";

    protected static ?string $navigationLabel = "Книги";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make("name")
                ->label("Название книги")
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make("description")
                ->label("Описание")
                ->required()
                ->rows(4),

            Forms\Components\TextInput::make("press")
                ->label("Издательство")
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make("cover_image")
                ->label("Обложка книги")
                ->image()
                ->directory("book-covers")
                ->required(),

            Forms\Components\FileUpload::make("pdf_path")
                ->label("PDF файл")
                ->acceptedFileTypes(["application/pdf"])
                ->directory("books")
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")
                    ->label("Название")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("press")
                    ->label("Издательство")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("description")
                    ->label("Описание")
                    ->limit(50),

                Tables\Columns\TextColumn::make("created_at")
                    ->label("Создано")
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label("Просмотр"),
                Tables\Actions\EditAction::make()->label("Редактировать"),
                Tables\Actions\DeleteAction::make()->label("Удалить"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label(
                        "Удалить выбранные"
                    ),
                ]),
            ])
            ->emptyStateHeading("Нет книг")
            ->emptyStateDescription("Добавьте первую книгу для начала работы.");
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
            "index" => Pages\ListBooks::route("/"),
            "create" => Pages\CreateBook::route("/create"),
            "edit" => Pages\EditBook::route("/{record}/edit"),
        ];
    }
}
