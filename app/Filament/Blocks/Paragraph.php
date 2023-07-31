<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use FilamentTiptapEditor\TiptapEditor;

class Paragraph
{
    public static function make(
        string $name = 'paragraph',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                TiptapEditor::make('text')
                    ->profile('barebone'),
            ]);
    }
}
