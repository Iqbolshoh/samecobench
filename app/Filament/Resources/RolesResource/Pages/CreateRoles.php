<?php

namespace App\Filament\Resources\RolesResource\Pages;

use App\Filament\Resources\RolesResource;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Permission;


class CreateRoles extends CreateRecord
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
     * Mutates the form data before creating a new role by handling permissions.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->permissions = $data['permissions'] ?? [];
        unset($data['permissions']);
        return $data;
    }

    /**
     * Syncs the permissions for the newly created role.
     */
    protected function afterCreate(): void
    {
        if (!empty($this->permissions)) {
            $permissionNames = Permission::whereIn('id', $this->permissions)->pluck('name')->toArray();
            $this->record->syncPermissions($permissionNames);
        }
    }
}
