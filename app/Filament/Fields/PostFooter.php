<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\PageCard;
use App\Filament\Blocks\PostCard;
use Filament\Forms\Components\Builder;

class PostFooter
{
    public static function build(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                PostCard::make(),
                PageCard::make(),
            ])
            ->collapsible();
    }
}
