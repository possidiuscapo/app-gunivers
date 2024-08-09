<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Filament\Resources\NewsletterSubscriberResource\RelationManagers;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterSubscriberResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-plus';

    protected static ?string $navigationGroup = "Visiteur";


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->placeholder('Nom'),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->placeholder('Prénom'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->placeholder('Adresse Mail')
                    ->suffixIcon('heroicon-o-envelope'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        1 => 'Subscribed',
                        0 => 'Unsubscribed',
                    ])
                    ->native(false)
                    ->placeholder('Statut'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lastname')
                    ->label('Nom'),
                Tables\Columns\TextColumn::make('firstname')
                    ->label('Prénom'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Adresse Mail'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut'),
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
            'index' => Pages\ListNewsletterSubscribers::route('/'),
            'create' => Pages\CreateNewsletterSubscriber::route('/create'),
            'edit' => Pages\EditNewsletterSubscriber::route('/{record}/edit'),
        ];
    }
}
