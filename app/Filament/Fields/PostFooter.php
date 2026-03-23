<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\PageCard;
use App\Filament\Blocks\PostCard;
use Filament\Forms\Components\Builder;

class PostFooter
{
    public static function make(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                PostCard::make(context: $context),
                PageCard::make(context: $context),
            ])
            ->collapsible();
    }
}
