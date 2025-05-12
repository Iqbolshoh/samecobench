<?php

namespace App\Filament\Resources\RolesResource\Pages;

use App\Filament\Resources\RolesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Spatie\Permission\Models\Permission;

class EditRoles extends EditRecord
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
            Actions\DeleteAction::make()->visible(fn($record) => $record->name !== 'superadmin'),
        ];
    }

    /**
     * Mutates the form data before saving the record, handling the permissions data.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->permissions = $data['permissions'] ?? [];
        unset($data['permissions']);
        return $data;
    }

    /**
     * Syncs the permissions for the role after saving the changes.
     */
    protected function afterSave(): void
    {
        if (!empty($this->permissions)) {
            $permissionNames = Permission::whereIn('id', $this->permissions)->pluck('name')->toArray();
            $this->record->syncPermissions($permissionNames);
        }
    }
}
