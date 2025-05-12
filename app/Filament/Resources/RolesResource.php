<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolesResource\Pages;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesResource extends Resource
{
    protected static ?string $model = Role::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Roles & Users';
    protected static ?int $navigationSort = 2;

    /**
     * Determine whether the current user can access this resource.
     */
    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('superadmin') ?? false;
    }

    /**
     * Define the form schema used for creating and editing roles.
     */
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->label('Role Name')
                ->regex('/^[a-zA-Z0-9-]+$/')
                ->helperText('Allowed characters: uppercase letters (A–Z), lowercase letters (a–z), numbers (0–9), and dash (-).')
                ->disabled(fn(?Role $record) => $record?->name === 'superadmin'),

            Select::make('permissions')
                ->relationship('permissions', 'name')
                ->label('Permissions')
                ->multiple()
                ->searchable()
                ->preload()
                ->required(fn(?Role $record) => $record?->name !== 'superadmin')
                ->minItems(fn(?Role $record) => $record?->name !== 'superadmin' ? 1 : 0)
                ->hidden(fn(?Role $record) => $record?->name === 'superadmin')
                ->options(static::getGroupedPermissions()),
        ]);
    }

    /**
     * Retrieve and cache grouped permissions for the select input.
     */
    protected static function getGroupedPermissions(): array
    {
        return Cache::remember('grouped_permissions', now()->addHour(), fn() => Permission::all()
            ->groupBy(fn(Permission $perm) => explode('.', $perm->name)[0])
            ->mapWithKeys(fn($group, string $key) => [
                ucfirst($key) => $group->pluck('name', 'id')->toArray(),
            ])->toArray());
    }

    /**
     * Sync the permissions of a role using permission IDs.
     */
    public static function syncPermissions(Role $role, array $permissionIds): void
    {
        $validIds = Permission::whereIn('id', $permissionIds)->pluck('id')->toArray();
        $permissionNames = Permission::whereIn('id', $validIds)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
    }

    /**
     * Define the table structure for displaying roles.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->with('permissions'))
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->label('ID'),
                TextColumn::make('name')->sortable()->searchable()->label('Role Name'),
                TextColumn::make('permissions.name')->label('Permissions')->badge(),
                TextColumn::make('users_count')->label('Users')->counts('users')->sortable()->badge()->color('success')->formatStateUsing(fn(?int $state) => $state ?? 0)->extraAttributes(['class' => 'hover:bg-success-100 transition-colors']),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Created At')->toggleable()->toggledHiddenByDefault(),
                TextColumn::make('updated_at')->dateTime()->sortable()->label('Updated At')->toggleable()->toggledHiddenByDefault(),
            ])
            ->filters([
                SelectFilter::make('permissions')
                    ->label('Permissions')
                    ->options(fn() => Permission::pluck('name', 'id')->toArray())
                    ->multiple()
                    ->preload()
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['values'])) {
                            return;
                        }
                        $query->whereHas('permissions', fn(Builder $subQuery) => $subQuery->whereIn('id', $data['values']));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn(Role $record) => $record->name !== 'superadmin'),
                Tables\Actions\DeleteAction::make()->visible(fn(Role $record) => $record->name !== 'superadmin'),
            ])
            ->bulkActions([])
            ->defaultSort('id', 'asc');
    }

    /**
     * Define the relationships available on this resource.
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * Define the available pages for this resource.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRoles::route('/create'),
            'edit' => Pages\EditRoles::route('/{record}/edit'),
        ];
    }
}
