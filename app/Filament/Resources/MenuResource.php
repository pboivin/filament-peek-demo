<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages\EditMenu;
use App\Filament\Resources\MenuResource\Pages\ListMenus;
use App\Models\Menu;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string | \UnitEnum | null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Navigation';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Repeater::make('items')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title')
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('url')
                            ->required()
                            ->columnSpan(1),
                    ]),

                    Radio::make('type')
                        ->options([
                            'internal' => 'internal',
                            'external' => 'external',
                        ])
                        ->default('internal')
                        ->required()
                        ->inline(),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                ]),
            ])
            ->filters([])
            ->toolbarActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMenus::route('/'),
            'edit' => EditMenu::route('/{record}/edit'),
            // 'create' => Pages\CreateMenu::route('/create'),
        ];
    }
}
