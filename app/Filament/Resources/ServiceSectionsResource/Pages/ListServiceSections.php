<?php

namespace App\Filament\Resources\ServiceSectionsResource\Pages;

use App\Filament\Resources\ServiceSectionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceSections extends ListRecords
{
    protected static string $resource = ServiceSectionsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
