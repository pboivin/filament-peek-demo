<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Navigation';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Repeater::make('items')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->columnSpan(1),
                    ]),

                    Forms\Components\Radio::make('type')
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
                Tables\Columns\TextColumn::make('name'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->filters([])
            ->bulkActions([]);
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
            'index' => Pages\ListMenus::route('/'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
            // 'create' => Pages\CreateMenu::route('/create'),
        ];
    }
}
