<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackComposantResource\Pages;
use App\Filament\Resources\PackComposantResource\RelationManagers;
use App\Models\Composant;
use App\Models\Pack;
use App\Models\PackComposant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackComposantResource extends Resource
{
    protected static ?string $model = PackComposant::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationGroup = "Ravitaillement";

    protected static ?string $navigationLabel = "Packs & Composants";


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pack_id')
                    ->label('Pack')
                    ->options(function () {
                        return Pack::all()->mapWithKeys(function ($pack) {
                            return [$pack->id => $pack->name . ' - ' . $pack->price . ' Fcfa'];
                        });
                    })
                    ->native(false)
                    ->required(),

                Forms\Components\Select::make('composant_id')
                    ->label('Composant')
                    ->options(function () {
                        return Composant::all()->mapWithKeys(function ($composant) {
                            return [$composant->id => $composant->quantity . ' ' . $composant->unity . ' ' . $composant->name];
                        });
                    })
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pack.name')
                    ->label('Pack')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('composant.name')
                    ->label('Composant')
                    ->sortable(),
                Tables\Columns\TextColumn::make('composant.quantity')
                    ->label('Quantité')
                    ->sortable(),
                Tables\Columns\TextColumn::make('composant.unity')
                    ->label('Unité'),
            ])
            ->filters([
                Tables\Filters\Filter::make('pack_id')
                    ->form([
                        Forms\Components\Select::make('pack_id')
                            ->label('Pack')
                            ->options(function () {
                                return Pack::all()->pluck('name', 'id');
                            })
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if (isset($data['pack_id']) && $data['pack_id']) {
                            return $query->where('pack_id', $data['pack_id']);
                        }

                        return $query;
                    }),
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
            'index' => Pages\ListPackComposants::route('/'),
            'create' => Pages\CreatePackComposant::route('/create'),
            'edit' => Pages\EditPackComposant::route('/{record}/edit'),
        ];
    }
}
