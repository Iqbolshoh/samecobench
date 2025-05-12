<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Roles & Users';
    protected static ?int $navigationSort = 3;

    /**
     * Determine whether the current user can access this resource.
     */
    public static function canAccess(): bool
    {
        return auth()->user()?->can('user.view') ?? false;
    }

    /**
     * Form Configuration: Defines fields for user creation and editing.
     */
    public static function form(Form $form): Form
    {

        $shouldDisable = fn($record) => auth()->user()?->hasRole('superadmin') ?
            $record && $record->id === auth()->id() :
            $record?->hasRole('superadmin') || auth()->id() === $record?->id || !auth()->user()?->can('user.edit') || self::hasMatchingRoles($record);

        $shouldDisable = $form->getOperation() === 'create' ? false : $shouldDisable;

        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->disabled($shouldDisable),

            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255)
                ->unique(User::class, 'email', ignoreRecord: true)
                ->disabled($shouldDisable),

            TextInput::make('password')
                ->password()
                ->label('Password')
                ->minLength(8)
                ->maxLength(255)
                ->requiredWith('passwordConfirmation')
                ->dehydrated(fn(?string $state): bool => filled($state))
                ->disabled($shouldDisable),

            TextInput::make('passwordConfirmation')
                ->password()
                ->label('Confirm Password')
                ->minLength(8)
                ->maxLength(255)
                ->requiredWith('password')
                ->same('password')
                ->dehydrated(fn(?string $state): bool => filled($state))
                ->disabled($shouldDisable),

            Select::make('roles')
                ->relationship('roles', 'name')
                ->preload()
                ->multiple()
                ->searchable()
                ->minItems(1)
                ->options(fn() => Role::where('name', '!=', 'superadmin')->pluck('name', 'id'))
                ->disabled($shouldDisable),
        ]);
    }

    /**
     * Table Configuration: Configures the table for displaying users.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('roles.name')->sortable()->badge(),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Created At')->toggleable()->toggledHiddenByDefault(),
                TextColumn::make('updated_at')->dateTime()->sortable()->label('Updated At')->toggleable()->toggledHiddenByDefault(),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(
                    fn($record) => auth()->user()?->hasRole('superadmin')
                    ? $record && $record->id !== auth()->id()
                    : $record && !$record->hasRole('superadmin') && auth()->user()?->can('user.edit') && auth()->id() !== $record->id && !self::hasMatchingRoles($record)
                ),

                Tables\Actions\DeleteAction::make()->visible(
                    fn($record) => auth()->user()?->hasRole('superadmin')
                    ? $record && $record->id !== auth()->id()
                    : $record && !$record->hasRole('superadmin') && auth()->user()?->can('user.delete') && auth()->id() !== $record->id && !self::hasMatchingRoles($record)
                ),
            ])
            ->bulkActions([]);
    }

    /**
     * Checks if the authenticated user has any matching roles with the target user.
     */
    public static function hasMatchingRoles($record): bool
    {
        return $record?->can('user.view') || $record?->can('user.create') || $record?->can('user.edit') || $record?->can('user.delete');
    }

    /**
     * Returns the relationships associated with this resource.
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * Page Routes Configuration: Defines routes for user management.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}
