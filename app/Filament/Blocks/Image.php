<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class Image extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'image');

        $block->schema([
            TextInput::make('caption'),
        ]);

        return $block;
    }
}
