<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SportEventResource\Pages;
use App\Models\SportEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SportEventResource extends Resource
{
    protected static ?string $model = SportEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    
    protected static ?string $navigationLabel = 'Спорттық іс-шаралар';
    
    protected static ?string $modelLabel = 'Спорттық іс-шара';
    
    protected static ?string $pluralModelLabel = 'Спорттық іс-шаралар';

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
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\Select::make('type')
                    ->label('Түрі')
                    ->required()
                    ->options([
                        'tournament' => 'Турнир',
                        'competition' => 'Жарыс',
                        'marathon' => 'Марафон',
                        'training' => 'Жаттығу',
                        'championship' => 'Чемпионат',
                        'festival' => 'Фестиваль',
                        'workshop' => 'Шеберхана',
                    ]),
                Forms\Components\FileUpload::make('images')
                    ->label('Суреттер')
                    ->image()
                    ->multiple()
                    ->directory('sport-events')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->label('Өткізілетін жері'),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Басталу күні')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Аяқталу күні'),
                Forms\Components\TimePicker::make('start_time')
                    ->label('Басталу уақыты'),
                Forms\Components\TextInput::make('participants_limit')
                    ->label('Қатысушылар лимиті')
                    ->numeric(),
                Forms\Components\TextInput::make('entry_fee')
                    ->label('Қатысу ақысы')
                    ->numeric()
                    ->step(0.01),
                Forms\Components\Toggle::make('is_active')
                    ->label('Белсенді')
                    ->default(true),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Ұсынылған'),
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Атауы')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Түрі')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'tournament' => 'Турнир',
                        'competition' => 'Жарыс',
                        'marathon' => 'Марафон',
                        'training' => 'Жаттығу',
                        'championship' => 'Чемпионат',
                        'festival' => 'Фестиваль',
                        'workshop' => 'Шеберхана',
                        default => 'Іс-шара'
                    })
                    ->badge(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Орны')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Басталу күні')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('participants_count')
                    ->label('Қатысушылар')
                    ->numeric(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Белсенді')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Ұсынылған')
                    ->boolean(),
            ])
            ->defaultSort('start_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Түрі')
                    ->options([
                        'tournament' => 'Турнир',
                        'competition' => 'Жарыс',
                        'marathon' => 'Марафон',
                        'training' => 'Жаттығу',
                        'championship' => 'Чемпионат',
                        'festival' => 'Фестиваль',
                        'workshop' => 'Шеберхана',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Белсенді'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Ұсынылған'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSportEvents::route('/'),
            'create' => Pages\CreateSportEvent::route('/create'),
            'edit' => Pages\EditSportEvent::route('/{record}/edit'),
        ];
    }
}
