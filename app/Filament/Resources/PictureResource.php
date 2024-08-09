<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PictureResource\Pages;
use App\Filament\Resources\PictureResource\RelationManagers;
use App\Models\Picture;
use App\Models\TypesPrestation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PictureResource extends Resource
{
    protected static ?string $model = Picture::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = "Blog";

    protected static ?string $navigationLabel = "Images Types Prestation";



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('types_prestations_id')
                    ->label('Type Prestation')
                    ->options(function () {
                        return TypesPrestation::all()->mapWithKeys(function ($typeprestation) {
                            return [$typeprestation->id => $typeprestation->title];
                        });
                    })
                    ->native(false)
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('typeprestation')
                    ->visibility('public')
                    ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('types_prestations.title')
                    ->label('Type Prestation Title'),

                Tables\Columns\ImageColumn::make('image')
                    ->disk('typeprestation'),
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
            'index' => Pages\ListPictures::route('/'),
            'create' => Pages\CreatePicture::route('/create'),
            'edit' => Pages\EditPicture::route('/{record}/edit'),
        ];
    }
}
