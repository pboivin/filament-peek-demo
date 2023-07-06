<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class PostCard extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'post_card');

        $block->schema([
            TextInput::make('text'),
        ]);

        $block->label('Link to post');

        return $block;
    }
}
