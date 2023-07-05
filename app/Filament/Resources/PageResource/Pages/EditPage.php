<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPage extends EditRecord
{
    use HasPreviewModal;
    use HasBuilderPreview;

    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            PreviewAction::make()->label('Preview Page'),
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

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return 'page.preview-content';
    }

    public static function getBuilderEditorSchema(string $builderName): array
    {
        return [
            PageResource::contentField('preview'),
        ];
    }

    public function updateBuilderFieldWithEditorData(string $builderName, array $editorData): void
    {
        if ($editorData[$builderName] ?? false) {
            $this->data[$builderName] = $editorData[$builderName];
        }

        if ($builderName === 'content') {
            // Refresh the Tiptap editor UI after updating the field data
            $this->dispatchBrowserEvent('update-editor-content', [
                'statePath' => "data.{$builderName}",
                'content' => $editorData[$builderName],
            ]);
        }
    }
}
