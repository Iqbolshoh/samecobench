<?php

namespace App\Filament\Resources\OurServicesResource\Pages;

use App\Filament\Resources\OurServicesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurServices extends ListRecords
{
    protected static string $resource = OurServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
