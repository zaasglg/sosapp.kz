<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeminarResource\Pages;
use App\Filament\Resources\SeminarResource\RelationManagers;
use App\Models\Seminar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeminarResource extends Resource
{
    protected static ?string $model = Seminar::class;

    protected static ?string $navigationIcon = "heroicon-o-academic-cap";

    protected static ?string $modelLabel = "Семинар";

    protected static ?string $pluralModelLabel = "Семинары";

    protected static ?string $navigationLabel = "Семинары";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make("name")
                ->label("Название")
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make("description")
                ->label("Описание")
                ->required()
                ->columnSpanFull()
                ->rows(4),

            Forms\Components\FileUpload::make("cover_image")
                ->label("Обложка семинара")
                ->image()
                ->directory("seminar-covers"),

            Forms\Components\Repeater::make("galleryItems")
                ->label("Галерея")
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make("title")
                        ->label("Заголовок")
                        ->required(),

                    Forms\Components\Textarea::make("description")
                        ->label("Описание")
                        ->rows(3),

                    Forms\Components\FileUpload::make("image_path")
                        ->label("Изображение")
                        ->image()
                        ->required()
                        ->directory("gallery"),

                    Forms\Components\Select::make("category")
                        ->label("Категория")
                        ->options([
                            "general" => "Общие",
                            "presentation" => "Презентации",
                            "discussion" => "Обсуждения",
                            "workshop" => "Мастер-классы",
                        ])
                        ->default("general"),

                    Forms\Components\TextInput::make("sort_order")
                        ->label("Порядок сортировки")
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make("is_featured")
                        ->label("Рекомендуемое")
                        ->default(false),
                ])
                ->collapsed()
                ->itemLabel(
                    fn(array $state): ?string => $state["title"] ?? null
                )
                ->addActionLabel("Добавить элемент галереи")
                ->reorderableWithButtons()
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("cover_image")
                    ->label("Обложка")
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make("name")
                    ->label("Название")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make("description")
                    ->label("Описание")
                    ->limit(50)
                    ->tooltip(function (
                        Tables\Columns\TextColumn $column
                    ): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),

                Tables\Columns\TextColumn::make("gallery_items_count")
                    ->label("Элементов в галерее")
                    ->counts("galleryItems")
                    ->badge()
                    ->color("primary"),

                Tables\Columns\TextColumn::make("created_at")
                    ->label("Создано")
                    ->dateTime("d.m.Y H:i")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make("updated_at")
                    ->label("Обновлено")
                    ->dateTime("d.m.Y H:i")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make("has_gallery")
                    ->label("С галереей")
                    ->query(
                        fn(Builder $query): Builder => $query->has(
                            "galleryItems"
                        )
                    ),

                Tables\Filters\Filter::make("has_cover")
                    ->label("С обложкой")
                    ->query(
                        fn(Builder $query): Builder => $query->whereNotNull(
                            "cover_image"
                        )
                    ),
            ])
            ->actions([
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
            ->emptyStateHeading("Семинары не найдены")
            ->emptyStateDescription("Начните с создания первого семинара.")
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
            "index" => Pages\ListSeminars::route("/"),
            "create" => Pages\CreateSeminar::route("/create"),
            "edit" => Pages\EditSeminar::route("/{record}/edit"),
        ];
    }
}
