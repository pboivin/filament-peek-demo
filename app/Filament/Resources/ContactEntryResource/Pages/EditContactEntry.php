<?php

namespace App\Filament\Resources\ContactEntryResource\Pages;

use App\Filament\Resources\ContactEntryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactEntry extends EditRecord
{
    protected static string $resource = ContactEntryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
