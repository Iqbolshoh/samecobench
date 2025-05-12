<?php

namespace App\Filament\Resources\MessagesResource\Pages;

use App\Filament\Resources\MessagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMessages extends EditRecord
{
    protected static string $resource = MessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->visible(fn() => auth()->user()?->can('message.delete'))
        ];
    }

    public function mount($record): void
    {
        parent::mount($record);

        if ($this->record->status === 'unread') {
            $this->record->update(['status' => 'read']);
        }
    }
}
