<?php

namespace App\Filament\Resources\FeaturesResource\Pages;

use App\Filament\Resources\FeaturesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeatures extends ListRecords
{
    protected static string $resource = FeaturesResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
