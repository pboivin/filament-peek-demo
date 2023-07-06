<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use FilamentTiptapEditor\TiptapEditor;

class Paragraph extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'paragraph');

        $block->schema([
            TiptapEditor::make('text')
                ->disableBubbleMenus()
                ->disableFloatingMenus()
                ->profile('barebone'),
        ]);

        return $block;
    }
}
