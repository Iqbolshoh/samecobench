<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceSectionsResource\Pages;
use App\Models\ServiceSection;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\FileUpload;

class ServiceSectionsResource extends Resource
{
    protected static ?string $model = ServiceSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Our Services';
    protected static ?int $navigationSort = 13;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('service-section.view');
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
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('sub_title')
                    ->label('Sub Title')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('services-images')
                    ->label('Image')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit')),

                RichEditor::make('text_1')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->label('Text 1')
                    ->extraAttributes($disableFileUploadButton)
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('text_2')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
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
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable(),
                Tables\Columns\TextColumn::make('sub_title')->label('Sub Title')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Created at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('service-section.edit')),
            ])
            ->bulkActions([
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
            'index' => Pages\ListServiceSections::route('/'),
            'edit' => Pages\EditServiceSections::route('/{record}/edit'),
        ];
    }
}
