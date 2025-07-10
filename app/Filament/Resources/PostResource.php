<?php

namespace App\Filament\Resources;

use App\Filament\Fields\PostContent;
use App\Filament\Fields\PostFooter;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Models\Post;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;
use Pboivin\FilamentPeek\Tables\Actions\ListPreviewAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    protected static string | \UnitEnum | null $navigationGroup = 'Blog';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Grid::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->columnSpan(1)
                            ->required()
                            ->lazy()
                            ->afterStateUpdated(function ($set, $get, $state) {
                                if ($get('slug')) {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->columnSpan(1)
                            ->required(),

                        DateTimePicker::make('published_at')
                            ->columnSpan(1),

                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->columnSpan(1)
                            ->required(),

                        Toggle::make('is_featured')
                            ->columnSpanFull()
                            ->required(),
                    ]),

                Section::make('Post Content')
                    ->schema([
                        // Actions::make([
                        //     InlinePreviewAction::make()
                        //         ->label('Preview Content Blocks')
                        //         ->builderName('content_blocks')
                        // ])
                        //     ->columnSpanFull()
                        //     ->alignRight(),

                        PostContent::make('content_blocks')
                            ->label('Blocks')
                            ->columnSpanFull(),
                    ])->collapsible(),

                Section::make('Post Footer')
                    ->schema([
                        // Actions::make([
                        //     InlinePreviewAction::make()
                        //         ->label('Open Footer Editor')
                        //         ->builderName('footer_blocks')
                        // ])
                        //     ->columnSpanFull()
                        //     ->alignRight(),

                        PostFooter::make('footer_blocks')
                            ->label('Blocks')
                            ->columnSpanFull(),
                    ])->collapsible(),

                TextInput::make('main_image_url')
                    ->label('Main image URL')
                    ->columnSpanFull(),

                FileUpload::make('main_image_upload')
                    ->label('Main image upload')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),
            ])
            ->recordActions([
                // ActionGroup::make([
                //     ListPreviewAction::make(),
                //     EditAction::make(),
                //     DeleteAction::make(),
                // ]),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),

                TernaryFilter::make('is_featured'),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
