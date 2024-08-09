<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComposantResource\Pages;
use App\Filament\Resources\ComposantResource\RelationManagers;
use App\Models\Composant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComposantResource extends Resource
{
    protected static ?string $model = Composant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Ravitaillement";

    protected static ?string $navigationLabel = "Composants";


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Nom du composant'),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->placeholder('Quantité'),

                Forms\Components\Select::make('unity')
                    ->options([
                        'kg' => 'kg',
                        'L' => 'L',
                        'g' => 'g',
                    ])
                    ->native(false)
                    ->placeholder('Quantité'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('unity'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Voir'),
                Tables\Actions\EditAction::make()
                    ->label('Modifier')
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->label('Supprimer'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListComposants::route('/'),
            'create' => Pages\CreateComposant::route('/create'),
            'edit' => Pages\EditComposant::route('/{record}/edit'),
        ];
    }
}
