<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Fields\PostContent;
use App\Filament\Fields\PostFooter;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPost extends EditRecord
{
    use HasPreviewModal;
    use HasBuilderPreview;

    protected static string $resource = PostResource::class;

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
        return match ($builderName) {
            'content_blocks' => 'post.preview-content',
            'footer_blocks' => 'post.preview-footer',
        };
    }

    public static function getBuilderEditorSchema(string $builderName): array
    {
        return [
            match ($builderName) {
                'content_blocks' => PostContent::make('content_blocks')->label('Content')->columnSpanFull(),
                'footer_blocks' => PostFooter::make('footer_blocks')->label('Footer')->columnSpanFull(),
            },
        ];
    }
}
