<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class Title extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'title');

        $block->schema([
            TextInput::make('text'),
        ]);

        return $block;
    }
}
