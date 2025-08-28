<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryItemResource\Pages;
use App\Filament\Resources\GalleryItemResource\RelationManagers;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static ?string $navigationIcon = "heroicon-o-photo";

    protected static ?string $modelLabel = "Галерея элементі";

    protected static ?string $pluralModelLabel = "Галерея";

    protected static ?string $navigationLabel = "Галерея";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make("title")
                ->label("Атауы")
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make("description")
                ->label("Сипаттама")
                ->rows(3),

            Forms\Components\FileUpload::make("image_path")
                ->label("Сурет")
                ->image()
                ->required()
                ->directory("gallery")
                ->imageEditor()
                ->imageEditorAspectRatios(["16:9", "4:3", "1:1"]),

            Forms\Components\TextInput::make("category")
                ->label("Санат")
                ->maxLength(255)
                ->datalist([
                    "Спорт",
                    "Іссапар",
                    "Жаттығулар",
                    "Жарыстар",
                    "Басқа",
                ]),

            Forms\Components\TextInput::make("sort_order")
                ->label("Сұрыптау реті")
                ->numeric()
                ->default(0),

            Forms\Components\Toggle::make("is_featured")
                ->label("Ұсынылған")
                ->default(false),

            Forms\Components\Select::make("event_id")
                ->label("Іссапар")
                ->relationship("businessTrip", "name")
                ->searchable()
                ->preload(),

            Forms\Components\Select::make("seminar_id")
                ->label("Семинар")
                ->relationship("seminar", "name")
                ->searchable()
                ->preload(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("image_path")
                    ->label("Сурет")
                    ->height(60)
                    ->width(60),

                Tables\Columns\TextColumn::make("title")
                    ->label("Атауы")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("category")
                    ->label("Санат")
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\IconColumn::make("is_featured")
                    ->label("Ұсынылған")
                    ->boolean(),

                Tables\Columns\TextColumn::make("sort_order")
                    ->label("Реті")
                    ->sortable(),

                Tables\Columns\TextColumn::make("businessTrip.name")
                    ->label("Іссапар")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("seminar.name")
                    ->label("Семинар")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("created_at")
                    ->label("Қосылды")
                    ->dateTime("d.m.Y H:i")
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("category")
                    ->label("Санат")
                    ->options([
                        "Спорт" => "Спорт",
                        "Іссапар" => "Іссапар",
                        "Жаттығулар" => "Жаттығулар",
                        "Жарыстар" => "Жарыстар",
                        "Басқа" => "Басқа",
                    ]),
                Tables\Filters\TernaryFilter::make("is_featured")
                    ->label("Ұсынылған")
                    ->boolean(),
                Tables\Filters\SelectFilter::make("event")
                    ->label("Іссапар")
                    ->relationship("businessTrip", "name"),

                Tables\Filters\SelectFilter::make("seminar")
                    ->label("Семинар")
                    ->relationship("seminar", "name")
                    ->searchable()
                    ->preload(),
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
            ->emptyStateHeading("Галерея бос")
            ->emptyStateDescription("Бірінші суретті қосу арқылы бастаңыз.")
            ->defaultSort("sort_order", "asc");
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
            "index" => Pages\ListGalleryItems::route("/"),
            "create" => Pages\CreateGalleryItem::route("/create"),
            "edit" => Pages\EditGalleryItem::route("/{record}/edit"),
        ];
    }
}
