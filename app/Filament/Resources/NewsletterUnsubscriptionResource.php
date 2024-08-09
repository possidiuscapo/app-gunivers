<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterUnsubscriptionResource\Pages;
use App\Filament\Resources\NewsletterUnsubscriptionResource\RelationManagers;
use App\Models\NewsletterSubscriber;
use App\Models\NewsletterUnsubscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterUnsubscriptionResource extends Resource
{
    protected static ?string $model = NewsletterUnsubscription::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-minus';

    protected static ?string $navigationGroup = "Visiteur";



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('reason')
                    ->required()
                    ->columnSpan('full')
                    ->placeholder('Raison désincription'),
                Forms\Components\Select::make('newsletter_subscriber_id')
                    ->columnSpan('full')
                    ->label('Newsletter Subscriber')
                    ->options(function () {
                        return NewsletterSubscriber::all()->mapWithKeys(function ($letter) {
                            return [$letter->id => $letter->lastname . ' ' . $letter->firstname];
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
                Tables\Columns\TextColumn::make('newsletterSubscriber.lastname')
                    ->label('Lastname')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('newsletterSubscriber.firstname')
                    ->label('firstname')
                    ->sortable(),
                Tables\Columns\TextColumn::make('newsletterSubscriber.email'),
                Tables\Columns\TextColumn::make('reason')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->reason),
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
            'index' => Pages\ListNewsletterUnsubscriptions::route('/'),
            'create' => Pages\CreateNewsletterUnsubscription::route('/create'),
            'edit' => Pages\EditNewsletterUnsubscription::route('/{record}/edit'),
        ];
    }
}
