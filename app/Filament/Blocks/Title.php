<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class Title extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'title');

        $block->schema([
            TextInput::make('text'),

            Select::make('level')
                ->options([
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                ])
                ->afterStateHydrated(fn ($state, $set) => $state || $set('level', 'h2')),
        ]);

        return $block;
    }
}
