<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\RichEditor;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): RichEditor {
        return RichEditor::make($name)->columnSpanFull();
    }
}
