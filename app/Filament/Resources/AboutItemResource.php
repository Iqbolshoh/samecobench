<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutItemResource\Pages;
use App\Models\AboutItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AboutItemResource extends Resource
{
    protected static ?string $model = AboutItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 10;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('about-item.view');
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
                Forms\Components\Select::make('about_id')
                    ->relationship('about', 'title')
                    ->disabled(fn() => !auth()->user()?->can('about-item.edit'))
                    ->required()
                    ->label('About'),

                Forms\Components\RichEditor::make('bullet_point')
                    ->label('Text')
                    ->disabled(fn() => !auth()->user()?->can('about-item.edit'))
                    ->extraAttributes($disableFileUploadButton)
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('about.title')->label('About')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('bullet_point')->label('Text')->sortable()->limit(50)->wrap(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated at')->sortable()->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('about-item.edit')),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutItems::route('/'),
            'edit' => Pages\EditAboutItem::route('/{record}/edit'),
        ];
    }
}
