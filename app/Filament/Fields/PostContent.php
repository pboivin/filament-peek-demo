<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\Image;
use App\Filament\Blocks\Paragraph;
use App\Filament\Blocks\Title;
use Filament\Forms\Components\Builder;

class PostContent
{
    public static function build(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                Title::build(context: $context),
                Paragraph::build(context: $context),
                Image::build(context: $context),
            ])
            ->collapsible();
    }
}
