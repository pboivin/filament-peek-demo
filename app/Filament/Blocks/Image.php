<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class Image
{
    public static function build(
        string $name = 'image',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                TextInput::make('url')->label('Image URL'),
                FileUpload::make('image')->label('Image upload'),
                TextInput::make('alt'),
                TextInput::make('caption'),
            ]);
    }
}
