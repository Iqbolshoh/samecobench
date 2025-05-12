<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;


class EditUsers extends EditRecord
{
    protected static string $resource = UsersResource::class;

    /**
     * Defines header actions for the user edit page, including delete action.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->visible(function ($record) {
                $user = auth()->user();
                $isSuperadmin = $user->hasRole('superadmin');

                if ($isSuperadmin) {
                    return $user->id !== $record->id;
                }

                return $record
                    && !$record->hasRole('superadmin')
                    && $user->can('user.delete')
                    && $user->id !== $record->id
                    && !UsersResource::hasMatchingRoles($record);
            }),
        ];
    }

    /**
     * Mutates the form data before saving, specifically hashing the password if provided.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }
}
