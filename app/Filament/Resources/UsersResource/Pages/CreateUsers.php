<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Resources\UsersResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUsers extends CreateRecord
{
    protected static string $resource = UsersResource::class;

    /**
     * Determines if the user can access the create user page.
     */
    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()?->can('user.create') ?? false;
    }

    /**
     * Mutates the form data before creating a user, specifically hashing the password.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}