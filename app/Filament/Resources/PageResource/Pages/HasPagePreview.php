<?php

namespace App\Filament\Resources\PageResource\Pages;

trait HasPagePreview
{
    // TODO
    // use HasPreviewModal;

    protected function getActions(): array
    {
        return [
            // PreviewAction::make()->label('Preview Page'),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'page.show';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'page';
    }
}
