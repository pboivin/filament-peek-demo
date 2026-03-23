<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\Image;
use App\Filament\Blocks\Paragraph;
use App\Filament\Blocks\Title;
use Filament\Forms\Components\Builder;

class PostContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                Title::make(context: $context),
                Paragraph::make(context: $context),
                Image::make(context: $context),
            ])
            ->collapsible();
    }
}
