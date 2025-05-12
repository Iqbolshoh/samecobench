<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 16;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('product.view');
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
            Select::make('category_id')
                ->label('Category')
                ->options(Category::pluck('name', 'id'))
                ->searchable()
                ->disabled(fn() => !auth()->user()?->can('product.edit'))
                ->required(),

            TextInput::make('product_name')
                ->required()
                ->disabled(fn() => !auth()->user()?->can('product.edit'))
                ->maxLength(255),

            TextInput::make('price')
                ->label('Price ($)')
                ->numeric()
                ->disabled(fn() => !auth()->user()?->can('product.edit'))
                ->required()
                ->minValue(0)
                ->maxValue(1000000000),

            RichEditor::make('description')
                ->required()
                ->label('Description')
                ->extraAttributes($disableFileUploadButton)
                ->columnSpanFull()
                ->disabled(fn() => !auth()->user()?->can('product.edit')),

            Repeater::make('images')
                ->relationship('images')
                ->label('Product Images')
                ->disabled(fn() => !auth()->user()?->can('product.edit'))
                ->schema([
                    FileUpload::make('image_url')
                        ->image()
                        ->directory('product-images')
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->previewable()
                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                        ->required(),
                ])
                ->minItems(1)
                ->columns(1),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->searchable()->sortable(),
                Tables\Columns\ImageColumn::make('images.0.image_url')->label('Product Image')->circular()->url(fn($record) => asset('storage/' . $record->images->first()->image_url))->sortable(),
                Tables\Columns\TextColumn::make('product_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->badge()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Price ($)')->money('USD', true)->sortable()->formatStateUsing(fn($state) => number_format($state, 2)),
                Tables\Columns\TextColumn::make('created_at')->since()->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('product.edit')),
                Tables\Actions\DeleteAction::make()->visible(fn() => auth()->user()?->can('product.delete')),
            ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
