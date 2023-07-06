<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\PageCard;
use App\Filament\Blocks\PostCard;
use Filament\Forms\Components\Builder;

class PostFooter extends Builder
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->blocks([
            PostCard::make(),
            PageCard::make(),
        ]);
    }
}
