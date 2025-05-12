<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Filament\Resources\MessagesResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Contact';
    protected static ?int $navigationSort = 18;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sender_name')
                    ->required()
                    ->disabled(true),

                Forms\Components\TextInput::make('sender_email')
                    ->email()
                    ->required()
                    ->disabled(true),

                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->disabled(true),

                Forms\Components\Textarea::make('body')
                    ->required()
                    ->disabled(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->sortable(),
                Tables\Columns\TextColumn::make('sender_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sender_email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subject')->searchable()->limit(20)->tooltip(fn($record) => $record->subject)->sortable(),
                Tables\Columns\BadgeColumn::make('status')->colors(['primary' => 'unread', 'success' => 'read'])->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Send at')->since()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->visible(fn() => auth()->user()?->can('message.delete')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->visible(fn() => auth()->user()?->can('message.delete')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = Message::where('status', 'unread')->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string|null
    {
        return 'warning';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'edit' => Pages\EditMessages::route('/{record}/edit'),
        ];
    }
}
