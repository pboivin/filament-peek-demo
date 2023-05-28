<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPost extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            PreviewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'post-show';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'post';
    }
}
