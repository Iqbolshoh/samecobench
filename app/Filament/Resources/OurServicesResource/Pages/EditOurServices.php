<?php

namespace App\Filament\Resources\OurServicesResource\Pages;

use App\Filament\Resources\OurServicesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurServices extends EditRecord
{
    protected static string $resource = OurServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
