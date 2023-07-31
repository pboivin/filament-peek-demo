<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\RichEditor;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): RichEditor {
        // return TiptapEditor::make($name)->columnSpanFull();

        return RichEditor::make($name)->columnSpanFull();
    }
}
