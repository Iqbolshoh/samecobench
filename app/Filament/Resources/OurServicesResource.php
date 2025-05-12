<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurServicesResource\Pages;
use App\Filament\Resources\OurServicesResource\RelationManagers;
use App\Models\OurServices;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurServicesResource extends Resource
{
    protected static ?string $model = OurServices::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $navigationGroup = 'Our Services';
    protected static ?int $navigationSort = 14;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('our-service.view');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('service_name')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('our-service.edit'))
                    ->maxLength(255)
                    ->label('Service name'),

                Forms\Components\Select::make('skill_level')
                    ->label('Skill level (%)')
                    ->disabled(fn() => !auth()->user()?->can('our-service.edit'))
                    ->required()
                    ->options(collect(range(0, 100, 1))->mapWithKeys(fn($v) => [$v => $v . '%'])->toArray())
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('service_name')->label('Service name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('skill_level')->label('Skill level (%)')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated at')->sortable()->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('our-service.edit')),
            ])
            ->bulkActions([]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOurServices::route('/'),
            'edit' => Pages\EditOurServices::route('/{record}/edit'),
        ];
    }
}
