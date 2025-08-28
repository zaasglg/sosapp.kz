<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectMemberResource\Pages;
use App\Filament\Resources\ProjectMemberResource\RelationManagers;
use App\Models\ProjectMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectMemberResource extends Resource
{
    protected static ?string $model = ProjectMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Жоба мүшелері';
    
    protected static ?string $modelLabel = 'Жоба мүшесі';
    
    protected static ?string $pluralModelLabel = 'Жоба мүшелері';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Негізгі ақпарат')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->label('Толық аты-жөні')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('position')
                            ->label('Қызметі/Рөлі')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('avatar_path')
                            ->label('Фото/Аватар')
                            ->image()
                            ->directory('project-members/avatars')
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('300'),
                        Forms\Components\Textarea::make('description')
                            ->label('Сипаттамасы/Биографиясы')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Қосымша ақпарат')
                    ->schema([
                        Forms\Components\TextInput::make('department')
                            ->label('Бөлім/Қызмет')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('specialization')
                            ->label('Мамандығы')
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->label('Мәртебесі')
                            ->required()
                            ->options([
                                'active' => 'Белсенді',
                                'inactive' => 'Белсенді емес',
                                'alumni' => 'Түлек'
                            ])
                            ->default('active'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Байланыс ақпараты')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\KeyValue::make('social_links')
                            ->label('Әлеуметтік желілер')
                            ->keyLabel('Платформа')
                            ->valueLabel('Құндылық')
                            ->keyPlaceholder('Платформа таңдаңыз')
                            ->valuePlaceholder('username немесе толық URL')
                            ->helperText('Платформалар: facebook, twitter, x, linkedin, telegram, instagram, github, youtube, tiktok, website')
                            ->addable()
                            ->deletable()
                            ->reorderable()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Дағдылар мен жобалар')
                    ->schema([
                        Forms\Components\TagsInput::make('skills')
                            ->label('Дағдылар')
                            ->placeholder('Дағды қосу үшін Enter басыңыз')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('projects')
                            ->label('Жобалар')
                            ->placeholder('Жоба қосу үшін Enter басыңыз')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Параметрлер')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Ерекше мүше')
                            ->helperText('Негізгі бетте көрсету'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Белсенді')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Реттеу реті (жаңа)')
                            ->numeric()
                            ->default(0)
                            ->helperText('Төмен сан - жоғары приоритет'),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Реттеу реті (ескі)')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_path')
                    ->label('Фото')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(fn() => 'https://ui-avatars.com/api/?name=' . urlencode('User') . '&background=6366f1&color=fff'),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Аты-жөні')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('position')
                    ->label('Қызметі')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('department')
                    ->label('Бөлім')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('specialization')
                    ->label('Мамандығы')
                    ->searchable()
                    ->toggleable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Мәртебесі')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Белсенді',
                        'inactive' => 'Белсенді емес',
                        'alumni' => 'Түлек',
                        default => 'Белгісіз'
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'gray',
                        'alumni' => 'primary',
                        default => 'secondary'
                    }),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Ерекше')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Белсенді')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ретті (жаңа)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Ретті (ескі)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Құрылған')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Мәртебесі')
                    ->options([
                        'active' => 'Белсенді',
                        'inactive' => 'Белсенді емес',
                        'alumni' => 'Түлек'
                    ]),
                Tables\Filters\SelectFilter::make('department')
                    ->label('Бөлім')
                    ->options(function () {
                        return ProjectMember::whereNotNull('department')
                            ->distinct()
                            ->pluck('department', 'department')
                            ->toArray();
                    }),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Ерекше мүшелер')
                    ->boolean()
                    ->trueLabel('Ерекше мүшелер ғана')
                    ->falseLabel('Қарапайым мүшелер')
                    ->native(false),
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
            'index' => Pages\ListProjectMembers::route('/'),
            'create' => Pages\CreateProjectMember::route('/create'),
            'edit' => Pages\EditProjectMember::route('/{record}/edit'),
        ];
    }
}
