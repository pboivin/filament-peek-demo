<?php

namespace App\Filament\Blocks;

use App\Models\Page;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PageCard extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'page_card');

        $block->schema([
            Select::make('page_id')
                ->label('Page')
                ->options(Page::orderBy('title')->pluck('title', 'id')),

            TextInput::make('text')
                ->label('Link text (optional)'),
        ]);

        $block->label('Link to page');

        return $block;
    }
}
