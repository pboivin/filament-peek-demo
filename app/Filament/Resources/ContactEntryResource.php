<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactEntryResource\Pages;
use App\Models\ContactEntry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ContactEntryResource extends Resource
{
    protected static ?string $model = ContactEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Contact';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Date')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->columnSpanFull()
                    ->email(),
                Forms\Components\Textarea::make('message')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListContactEntries::route('/'),
            'view' => Pages\ViewContactEntry::route('/{record}'),
            // 'create' => Pages\CreateContactEntry::route('/create'),
            // 'edit' => Pages\EditContactEntry::route('/{record}/edit'),
        ];
    }
}
