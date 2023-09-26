<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\MarkdownEditor;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): MarkdownEditor {
        return MarkdownEditor::make($name)->columnSpanFull();
    }
}
