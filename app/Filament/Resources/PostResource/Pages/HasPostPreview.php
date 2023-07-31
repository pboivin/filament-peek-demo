<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Fields\PostContent;
use App\Filament\Fields\PostFooter;
use Filament\Forms\Components\Component;
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
            PreviewAction::make()->label('Preview Changes'),
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
        return match ($builderName) {
            'content_blocks' => 'post.preview-content',
            'footer_blocks' => 'post.preview-footer',
        };
    }

    public static function getBuilderEditorSchema(string $builderName): Component|array
    {
        return match ($builderName) {
            'content_blocks' => PostContent::make(
                name: 'content_blocks',
                context: 'preview',
            )
                ->label('Content')
                ->columnSpanFull(),

            'footer_blocks' => PostFooter::make(
                name: 'footer_blocks',
                context: 'preview',
            )
                ->label('Footer')
                ->columnSpanFull(),
        };
    }
}
