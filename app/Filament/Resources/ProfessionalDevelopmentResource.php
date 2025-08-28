<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfessionalDevelopmentResource\Pages;
use App\Filament\Resources\ProfessionalDevelopmentResource\RelationManagers;
use App\Models\ProfessionalDevelopment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfessionalDevelopmentResource extends Resource
{
    protected static ?string $model = ProfessionalDevelopment::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Біліктілік арттыру';

    protected static ?string $modelLabel = 'Біліктілік арттыру';

    protected static ?string $pluralModelLabel = 'Біліктілік арттыру';

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
                    ])->columns(1),

                Forms\Components\Section::make('Медиа файлдар')
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Негізгі сурет')
                            ->image()
                            ->directory('professional-development')
                            ->imageEditor(),

                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('Галерея суреттері')
                            ->image()
                            ->multiple()
                            ->directory('professional-development/gallery')
                            ->imageEditor()
                            ->reorderable()
                            ->maxFiles(10),

                        Forms\Components\FileUpload::make('pdf_file')
                            ->label('PDF файл')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('professional-development/pdf')
                            ->maxSize(10240),
                    ])->columns(1),

                Forms\Components\Section::make('Параметрлер')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Сұрыптау реті')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Белсенді')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Сурет')
                    ->circular()
                    ->size(60),

                Tables\Columns\TextColumn::make('title')
                    ->label('Атауы')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('description')
                    ->label('Сипаттамасы')
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\IconColumn::make('pdf_file')
                    ->label('PDF')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-mark')
                    ->getStateUsing(fn ($record) => !empty($record->pdf_file)),

                Tables\Columns\TextColumn::make('gallery_images')
                    ->label('Галерея')
                    ->getStateUsing(fn ($record) => is_array($record->gallery_images) ? count($record->gallery_images) : 0)
                    ->suffix(' сурет'),

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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Белсенді'),

                Tables\Filters\Filter::make('has_pdf')
                    ->label('PDF файлы бар')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('pdf_file')),

                Tables\Filters\Filter::make('has_gallery')
                    ->label('Галереясы бар')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('gallery_images')),
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
            'index' => Pages\ListProfessionalDevelopments::route('/'),
            'create' => Pages\CreateProfessionalDevelopment::route('/create'),
            'edit' => Pages\EditProfessionalDevelopment::route('/{record}/edit'),
        ];
    }
}
