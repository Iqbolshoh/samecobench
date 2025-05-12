<?php

namespace App\Filament\Resources\AboutItemResource\Pages;

use App\Filament\Resources\AboutItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutItem extends EditRecord
{
    protected static string $resource = AboutItemResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
