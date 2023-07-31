<?php

namespace App\Filament\Resources\ContactEntryResource\Pages;

use App\Filament\Resources\ContactEntryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactEntry extends CreateRecord
{
    protected static string $resource = ContactEntryResource::class;
}
