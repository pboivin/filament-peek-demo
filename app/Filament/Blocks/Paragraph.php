<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;

class Paragraph
{
    public static function make(
        string $name = 'paragraph',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                // TiptapEditor::make('text')->profile('barebone'),

                RichEditor::make('text'),
            ]);
    }
}
