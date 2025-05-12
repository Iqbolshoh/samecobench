<?php

namespace App\Filament\Resources\StatisticsResource\Pages;

use App\Filament\Resources\StatisticsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatistics extends EditRecord
{
    protected static string $resource = StatisticsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
