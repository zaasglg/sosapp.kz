<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessTripResource\Pages;
use App\Filament\Resources\BusinessTripResource\RelationManagers;
use App\Models\BusinessTrip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessTripResource extends Resource
{
    protected static ?string $model = BusinessTrip::class;

    protected static ?string $navigationIcon = "heroicon-o-briefcase";

    protected static ?string $modelLabel = "Іссапар";

    protected static ?string $pluralModelLabel = "Іссапарлар";

    protected static ?string $navigationLabel = "Іссапарлар";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make("name")
                ->label("Іссапар атауы")
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make("description")
                ->label("Сипаттама")
                ->required()
                ->rows(4),

            Forms\Components\FileUpload::make("cover_image")
                ->label("Іссапар суреті")
                ->image()
                ->directory("business-trip-covers"),

            Forms\Components\TextInput::make("youtube_video_url")
                ->label("YouTube видео сілтемесі")
                ->url()
                ->maxLength(255),

            Forms\Components\Repeater::make("galleryItems")
                ->label("Галерея")
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make("title")
                        ->label("Сурет атауы")
                        ->required(),
                    Forms\Components\Textarea::make("description")
                        ->label("Сипаттама")
                        ->rows(2),
                    Forms\Components\FileUpload::make("image_path")
                        ->label("Сурет")
                        ->image()
                        ->required()
                        ->directory("gallery"),
                    Forms\Components\TextInput::make("category")
                        ->label("Санат")
                        ->default("Іссапар"),
                    Forms\Components\TextInput::make("sort_order")
                        ->label("Реті")
                        ->numeric()
                        ->default(0),
                ])
                ->collapsible()
                ->itemLabel(
                    fn(array $state): ?string => $state["title"] ?? null
                )
                ->addActionLabel("Сурет қосу")
                ->reorderableWithButtons(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("cover_image")
                    ->label("Сурет")
                    ->height(60)
                    ->width(60),

                Tables\Columns\TextColumn::make("name")
                    ->label("Атауы")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("galleryItems")
                    ->label("Галерея")
                    ->formatStateUsing(
                        fn($record) => $record->galleryItems->count() . " сурет"
                    ),
                    
                Tables\Columns\IconColumn::make("youtube_video_url")
                    ->label("YouTube видео")
                    ->boolean()
                    ->trueIcon('heroicon-o-play')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make("created_at")
                    ->label("Құрылды")
                    ->dateTime("d.m.Y H:i")
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label("Көру"),
                Tables\Actions\EditAction::make()->label("Өзгерту"),
                Tables\Actions\DeleteAction::make()->label("Жою"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label(
                        "Таңдалғандарды жою"
                    ),
                ]),
            ])
            ->emptyStateHeading("Іссапарлар жоқ")
            ->emptyStateDescription("Бірінші іссапарды қосу арқылы бастаңыз.")
            ->defaultSort("created_at", "desc");
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
            "index" => Pages\ListBusinessTrips::route("/"),
            "create" => Pages\CreateBusinessTrip::route("/create"),
            "edit" => Pages\EditBusinessTrip::route("/{record}/edit"),
        ];
    }
}
