<?php

namespace App\Filament\Blocks;

use App\Models\Post;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PostCard extends Block
{
    public static function make(?string $name = null): static
    {
        $block = parent::make($name ?: 'post_card');

        $block->schema([
            Select::make('post_id')
                ->label('Post')
                ->options(Post::published()->orderBy('title')->pluck('title', 'id')),

            TextInput::make('text')
                ->label('Link text (optional)'),
        ]);

        $block->label('Link to post');

        return $block;
    }
}
