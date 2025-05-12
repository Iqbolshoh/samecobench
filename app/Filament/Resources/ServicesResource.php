<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServicesResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Our Services';
    protected static ?int $navigationSort = 12;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('service.view');
    }

    public static function form(Form $form): Form
    {
        $disableFileUploadButton = [
            'x-init' => <<<JS
                setTimeout(() => {
                    document.querySelectorAll('trix-toolbar [data-trix-action="attachFiles"]')
                        .forEach(btn => btn.remove());
                }, 500);
            JS,
        ];
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->disabled(fn() => !auth()->user()?->can('service.edit'))
                    ->required()
                    ->maxLength(255),

                RichEditor::make('description')
                    ->required()
                    ->label('Description')
                    ->extraAttributes($disableFileUploadButton)
                    ->columnSpanFull()
                    ->disabled(fn() => !auth()->user()?->can('service.edit')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated at')->sortable()->dateTime(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('service.edit')),
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
            'index' => Pages\ListServices::route('/'),
            'edit' => Pages\EditServices::route('/{record}/edit'),
        ];
    }
}
