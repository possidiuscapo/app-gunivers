<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceSousServiceResource\Pages;
use App\Filament\Resources\ServiceSousServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\ServiceSousService;
use App\Models\SousService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceSousServiceResource extends Resource
{
    protected static ?string $model = ServiceSousService::class;

    protected static ?string $navigationIcon = 'heroicon-m-swatch';

    protected static ?string $navigationGroup = "Offres";

    protected static ?string $navigationLabel = "Service ¤ Sous service";



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('service_id')
                ->label('Service')
                ->options(Service::all()->pluck('name', 'id'))
                ->required(),

            Forms\Components\Select::make('sous_service_id')
                ->label('Sous-service')
                ->options(SousService::all()->pluck('name', 'id'))
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sousService.name')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->sousService->description),
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
            'index' => Pages\ListServiceSousServices::route('/'),
            'create' => Pages\CreateServiceSousService::route('/create'),
            'edit' => Pages\EditServiceSousService::route('/{record}/edit'),
        ];
    }
}
