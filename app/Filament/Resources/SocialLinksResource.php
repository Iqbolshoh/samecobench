<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialLinksResource\Pages;
use App\Models\SocialLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SocialLinksResource extends Resource
{
    protected static ?string $model = SocialLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';
    protected static ?string $navigationGroup = 'Contact';
    protected static ?int $navigationSort = 17;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('social-link.view');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->disabled(true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('value')
                    ->disabled(fn() => !auth()->user()?->can('social-link.edit'))
                    ->maxLength(255),

                Forms\Components\Toggle::make('is_active')
                    ->disabled(fn() => !auth()->user()?->can('social-link.edit'))
                    ->default(true),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('value')->searchable()->sortable()->badge()->openUrlInNewTab()->url(fn($record) => $record->link && $record->value ? $record->link . $record->value : ''),
                Tables\Columns\IconColumn::make('is_active')->boolean()->trueIcon('heroicon-o-check-circle')->falseIcon('heroicon-o-x-circle')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('social-link.edit')),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialLinks::route('/'),
            'edit' => Pages\EditSocialLinks::route('/{record}/edit'),
        ];
    }
}
