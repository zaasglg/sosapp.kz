<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationLabel = 'Сертификаттар';
    
    protected static ?string $modelLabel = 'Сертификат';
    
    protected static ?string $pluralModelLabel = 'Сертификаттар';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Атауы')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Сипаттамасы')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Сурет')
                    ->image()
                    ->required()
                    ->directory('certificates')
                    ->imageEditor(),
                Forms\Components\TextInput::make('recipient_name')
                    ->label('Алушы аты')
                    ->maxLength(255),
                Forms\Components\TextInput::make('organization')
                    ->label('Ұйым')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('issued_date')
                    ->label('Берілген күні'),
                Forms\Components\Select::make('category')
                    ->label('Категориясы')
                    ->required()
                    ->options([
                        'course' => 'Курс',
                        'seminar' => 'Семинар',
                        'workshop' => 'Шеберхана',
                        'conference' => 'Конференция',
                        'achievement' => 'Жетістік',
                        'general' => 'Жалпы'
                    ])
                    ->default('general'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Белсенді')
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Реттеу реті')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Сурет')
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->label('Атауы')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('recipient_name')
                    ->label('Алушы')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('organization')
                    ->label('Ұйым')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('issued_date')
                    ->label('Берілген күні')
                    ->date('d.m.Y')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Категория')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'course' => 'Курс',
                        'seminar' => 'Семинар',
                        'workshop' => 'Шеберхана',
                        'conference' => 'Конференция',
                        'achievement' => 'Жетістік',
                        default => 'Жалпы'
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'course' => 'primary',
                        'seminar' => 'success',
                        'workshop' => 'warning',
                        'conference' => 'danger',
                        'achievement' => 'info',
                        default => 'secondary'
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Белсенді')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Ретті')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Құрылған')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Категория')
                    ->options([
                        'course' => 'Курс',
                        'seminar' => 'Семинар',
                        'workshop' => 'Шеберхана',
                        'conference' => 'Конференция',
                        'achievement' => 'Жетістік',
                        'general' => 'Жалпы'
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Белсенді')
                    ->boolean()
                    ->trueLabel('Белсенді ғана')
                    ->falseLabel('Белсенді емес')
                    ->native(false),
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
