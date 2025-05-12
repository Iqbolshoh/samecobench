<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Storage;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->visible(fn() => auth()->user()?->can('news.create'))
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $oldImages = $this->extractImages($this->record->description);
        $newImages = $this->extractImages($data['description']);

        $deleted = array_diff($oldImages, $newImages);

        foreach ($deleted as $file) {
            $file = str_replace('/storage/', '', parse_url($file, PHP_URL_PATH));
            Storage::disk('public')->delete($file);
        }

        if (isset($data['image']) && $data['image'] !== $this->record->image) {
            if ($this->record->image) {
                $oldImage = str_replace('/storage/', '', $this->record->image);
                Storage::disk('public')->delete($oldImage);
            }
        }

        return $data;
    }

    private function extractImages($content): array
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
        return $matches[1] ?? [];
    }
}
