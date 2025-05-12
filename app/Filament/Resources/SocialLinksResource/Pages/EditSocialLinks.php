<?php

namespace App\Filament\Resources\SocialLinksResource\Pages;

use App\Filament\Resources\SocialLinksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialLinks extends EditRecord
{
    protected static string $resource = SocialLinksResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
