<?php

namespace App\Filament\Resources;

use App\Filament\Fields\PostContent;
use App\Filament\Fields\PostFooter;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Support\Str;
use Pboivin\FilamentPeek\Forms\Components\PreviewLink;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make()->columns(2)->schema([
                Forms\Components\TextInput::make('title')
                    ->columnSpan(1)
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(function ($set, $get, $state) {
                        if ($get('slug')) {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->columnSpan(1)
                    ->required(),

                Forms\Components\DateTimePicker::make('published_at')
                    ->columnSpan(1),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->columnSpan(1)
                    ->required(),

                Forms\Components\Toggle::make('is_featured')
                    ->columnSpanFull()
                    ->required(),
            ]),

            Forms\Components\Section::make('Post Content')->schema([
                PreviewLink::make()
                    ->label('Open Content Editor')
                    ->builderPreview('content_blocks')
                    ->columnSpanFull()
                    ->alignRight(),

                PostContent::make('content_blocks')
                    ->label('Blocks')
                    ->columnSpanFull(),
            ])->collapsible(),

            Forms\Components\Section::make('Post Footer')->schema([
                PreviewLink::make()
                    ->label('Open Footer Editor')
                    ->builderPreview('footer_blocks')
                    ->columnSpanFull()
                    ->alignRight(),

                PostFooter::make('footer_blocks')
                    ->label('Blocks')
                    ->columnSpanFull(),
            ])->collapsible(),

            Forms\Components\TextInput::make('main_image_url')
                ->label('Main image URL')
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('main_image_upload')
                ->label('Main image upload')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view_post')
                        ->label('View')
                        ->icon('heroicon-s-eye')
                        ->url(fn ($record) => route('post.show', ['slug' => $record->slug]))
                        ->openUrlInNewTab(),

                    Tables\Actions\EditAction::make(),

                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),

                TernaryFilter::make('is_featured'),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
