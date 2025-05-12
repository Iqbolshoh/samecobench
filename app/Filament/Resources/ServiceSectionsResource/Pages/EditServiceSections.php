<?php

namespace App\Filament\Resources\ServiceSectionsResource\Pages;

use App\Filament\Resources\ServiceSectionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceSections extends EditRecord
{
    protected static string $resource = ServiceSectionsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
