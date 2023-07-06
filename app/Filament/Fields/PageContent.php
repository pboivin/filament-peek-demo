<?php

namespace App\Filament\Fields;

use FilamentTiptapEditor\TiptapEditor;

class PageContent extends TiptapEditor
{
    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'content')
            ->columnSpanFull();
    }
}
