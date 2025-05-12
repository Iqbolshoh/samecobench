<?php

namespace App\Filament\Resources\RolesResource\Pages;

use App\Filament\Resources\RolesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RolesResource::class;

    /**
     * Determine whether the current user can access this resource.
     */
    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()?->hasRole('superadmin') ?? false;
    }

    /**
     * Defines actions available in the header, specifically showing the delete action unless the role is 'superadmin'.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
