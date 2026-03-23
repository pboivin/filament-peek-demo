<?php

namespace App\Filament\Resources\ContactEntryResource\Pages;

use App\Filament\Resources\ContactEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditContactEntry extends EditRecord
{
    protected static string $resource = ContactEntryResource::class;

    protected function getActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
