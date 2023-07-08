<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class Image
{
    public static function make(
        string $name = 'image',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                TextInput::make('url')
                    ->label('Image URL'),

                FileUpload::make('image')
                    ->label('Image upload'),

                Select::make('ratio')
                    ->options([
                        '4-3' => '4/3',
                        '3-4' => '3/4',
                        'free' => 'free',
                    ])
                    ->afterStateHydrated(fn ($state, $set) => $state || $set('ratio', '4-3')),

                TextInput::make('alt')
                    ->columnSpanFull(),

                TextInput::make('caption')
                    ->columnSpanFull(),
            ])
            ->columns($context === 'form' ? 2 : 1);
    }
}
