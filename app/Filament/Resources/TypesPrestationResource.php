<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypesPrestationResource\Pages;
use App\Filament\Resources\TypesPrestationResource\RelationManagers;
use App\Models\Prestation;
use App\Models\TypesPrestation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class TypesPrestationResource extends Resource
{
    protected static ?string $model = TypesPrestation::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = "Blog";

    protected static ?string $navigationLabel = "Types Prestation";




    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->placeholder('Titre de la prestation'),

                Forms\Components\Select::make('prestation_id')
                    ->label('Prestation')
                    ->options(function () {
                        return Prestation::all()->mapWithKeys(function ($prestation) {
                            return [$prestation->id => $prestation->title];
                        });
                    })
                    ->native(false)
                    ->required(),

                TinyEditor::make('description')
                    ->columnSpan('full')
                    ->language('fr')
                    ->showMenuBar()
                    ->fileAttachmentsDisk('server')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('uploads')
                    ->required()
                    ->minHeight(500)
                    ->setRelativeUrls(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->description),
                Tables\Columns\TextColumn::make('prestation.title')
                    ->label('Prestation Title'),
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
            'index' => Pages\ListTypesPrestations::route('/'),
            'create' => Pages\CreateTypesPrestation::route('/create'),
            'edit' => Pages\EditTypesPrestation::route('/{record}/edit'),
        ];
    }
}
