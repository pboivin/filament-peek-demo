<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Fields\PostContent;
use Filament\Schemas\Components\Component;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPostPreview
{
    use HasPreviewModal;
    use HasBuilderPreview;

    protected function getActions(): array
    {
        return [
            PreviewAction::make()->label('Preview Post'),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'post.show';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'post';
    }

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return 'post.preview-content';
    }

    public static function getBuilderEditorSchema(string $builderName): Component|array
    {
        return PostContent::make(name: 'content_blocks', context: 'preview')
            ->label('Content')
            ->columnSpanFull();
    }
}
