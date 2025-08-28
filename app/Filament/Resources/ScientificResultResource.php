<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScientificResultResource\Pages;
use App\Filament\Resources\ScientificResultResource\RelationManagers;
use App\Models\ScientificResult;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScientificResultResource extends Resource
{
    protected static ?string $model = ScientificResult::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Ғылыми нәтижелер';

    protected static ?string $modelLabel = 'Ғылыми нәтиже';

    protected static ?string $pluralModelLabel = 'Ғылыми нәтижелер';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Негізгі ақпарат')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Атауы')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Сипаттамасы')
                            ->required()
                            ->rows(4),

                        Forms\Components\Select::make('type')
                            ->label('Түрі')
                            ->options([
                                'article' => 'Мақала',
                                'interview' => 'Сұхбат',
                                'social_media' => 'Әлеуметтік желі',
                            ])
                            ->required()
                            ->default('article'),

                        Forms\Components\TextInput::make('source')
                            ->label('Дереккөз')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('url')
                            ->label('Сілтеме')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Жарияланған күні'),
                    ])->columns(2),

                Forms\Components\Section::make('Файл және параметрлер')
                    ->schema([
                        Forms\Components\FileUpload::make('pdf_path')
                            ->label('PDF файл')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('scientific-results')
                            ->downloadable(),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Сұрыптау реті')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Белсенді')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Атауы')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Түрі')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'article' => 'Мақала',
                        'interview' => 'Сұхбат',
                        'social_media' => 'Әлеуметтік желі',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'article',
                        'success' => 'interview',
                        'warning' => 'social_media',
                    ]),

                Tables\Columns\TextColumn::make('source')
                    ->label('Дереккөз')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\IconColumn::make('url')
                    ->label('Сілтеме')
                    ->boolean()
                    ->trueIcon('heroicon-o-link')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\IconColumn::make('pdf_path')
                    ->label('PDF')
                    ->boolean()
                    ->trueIcon('heroicon-o-document')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Жарияланған')
                    ->date('d.m.Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Белсенді')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Реті')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Құрылған')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Түрі')
                    ->options([
                        'article' => 'Мақала',
                        'interview' => 'Сұхбат',
                        'social_media' => 'Әлеуметтік желі',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Белсенді'),

                Tables\Filters\Filter::make('has_url')
                    ->label('Сілтемесі бар')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('url')),

                Tables\Filters\Filter::make('has_pdf')
                    ->label('PDF файлы бар')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('pdf_path')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
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
            'index' => Pages\ListScientificResults::route('/'),
            'create' => Pages\CreateScientificResult::route('/create'),
            'edit' => Pages\EditScientificResult::route('/{record}/edit'),
        ];
    }
}
