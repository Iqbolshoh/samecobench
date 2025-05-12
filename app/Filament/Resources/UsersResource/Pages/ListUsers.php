<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListUsers extends ListRecords
{
    protected static string $resource = UsersResource::class;

    /**
     * Defines header actions for the user list page, including create action.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->visible(fn() => auth()->user()?->can('user.create') ?? false),
        ];
    }
}
