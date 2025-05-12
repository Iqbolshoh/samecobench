<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'News';
    protected static ?int $navigationSort = 8;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('news.view');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn() => !auth()->user()?->can('news.edit')),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('news-images')
                    ->label('Image')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->disabled(fn() => !auth()->user()?->can('news.edit')),

                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->label('Description')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('uploads/news')
                    ->columnSpanFull()
                    ->disabled(fn() => !auth()->user()?->can('news.edit')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')->label('№')->rowIndex()->sortable(false),
                Tables\Columns\ImageColumn::make('image')->label('Image')->circular()->sortable(),
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable()->limit(30)->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->sortable()->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->sortable()->dateTime()->since(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
            ])
            ->actions([
                EditAction::make()->visible(fn() => auth()->user()?->can('news.edit')),
                DeleteAction::make()->visible(fn() => auth()->user()?->can('news.delete')),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
