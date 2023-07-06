<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class PageCard extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'page_card');

        $block->schema([
            TextInput::make('text'),
        ]);

        $block->label('Link to page');

        return $block;
    }
}
