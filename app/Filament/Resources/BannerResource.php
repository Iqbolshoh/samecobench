<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 6;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('banner.view');
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
                    ->required()
                    ->label('Title')
                    ->disabled(fn() => !auth()->user()?->can('banner.edit'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('button_text')
                    ->nullable()
                    ->label('Button Text')
                    ->disabled(fn() => !auth()->user()?->can('banner.edit'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('button_link')
                    ->nullable()
                    ->label('Button Link')
                    ->maxLength(255)
                    ->disabled(fn() => !auth()->user()?->can('banner.edit')),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('banner-images')
                    ->label('Image')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->disabled(fn() => !auth()->user()?->can('banner.edit')),

                RichEditor::make('description')
                    ->required()
                    ->label('Description')
                    ->extraAttributes($disableFileUploadButton)
                    ->disabled(fn() => !auth()->user()?->can('banner.edit'))
                    ->maxLength(500)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('button_text')
                    ->label('Button Text')
                    ->default('-')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable()
                    ->dateTime(),
            ])

            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('banner.edit')),
                Tables\Actions\DeleteAction::make()->visible(fn() => auth()->user()?->can('banner.delete')),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
