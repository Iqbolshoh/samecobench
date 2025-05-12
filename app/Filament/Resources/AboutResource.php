<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 9;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('about.view');
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

        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->disabled(fn() => !auth()->user()?->can('about.edit'))
                ->maxLength(255)
                ->label('Title'),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->required()
                ->directory('about-images')
                ->label('Image')
                ->imageEditor()
                ->imageEditorMode(2)
                ->openable()
                ->downloadable()
                ->previewable()
                ->acceptedFileTypes(['image/jpeg', 'image/png'])
                ->disabled(fn() => !auth()->user()?->can('about.edit')),

            RichEditor::make('text_1')
                ->required()
                ->disabled(fn() => !auth()->user()?->can('about.edit'))
                ->label('Text 1')
                ->extraAttributes($disableFileUploadButton)
                ->required()
                ->columnSpanFull(),

            RichEditor::make('text_2')
                ->required()
                ->disabled(fn() => !auth()->user()?->can('about.edit'))
                ->label('Text 2')
                ->extraAttributes($disableFileUploadButton)
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image')->circular(),
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('about.edit')),
            ])
            ->bulkActions([
            ])
            ->headerActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
