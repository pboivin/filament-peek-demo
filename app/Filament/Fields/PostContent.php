<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\Image;
use App\Filament\Blocks\Paragraph;
use App\Filament\Blocks\Title;
use Filament\Forms\Components\Builder;

class PostContent extends Builder
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->blocks([
            Title::make(),
            Paragraph::make(),
            Image::make(),
        ]);
    }
}
