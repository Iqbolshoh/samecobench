<?php

namespace App\Filament\Resources\SocialLinksResource\Pages;

use App\Filament\Resources\SocialLinksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialLinks extends ListRecords
{
    protected static string $resource = SocialLinksResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
