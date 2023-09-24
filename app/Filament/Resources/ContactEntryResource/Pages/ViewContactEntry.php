<?php

namespace App\Filament\Resources\ContactEntryResource\Pages;

use App\Filament\Resources\ContactEntryResource;
use Filament\Resources\Pages\ViewRecord;

class ViewContactEntry extends ViewRecord
{
    protected static string $resource = ContactEntryResource::class;

    protected function getActions(): array
    {
        return [];
    }
}
