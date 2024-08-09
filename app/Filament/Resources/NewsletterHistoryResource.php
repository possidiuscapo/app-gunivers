<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterHistoryResource\Pages;
use App\Filament\Resources\NewsletterHistoryResource\RelationManagers;
use App\Models\Newsletter;
use App\Models\NewsletterHistory;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterHistoryResource extends Resource
{
    protected static ?string $model = NewsletterHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = "Visiteur";



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('newsletter_subscriber_id')
                    ->label('Newsletter Subscriber')
                    ->options(function () {
                        return NewsletterSubscriber::all()->mapWithKeys(function ($letter) {
                            return [$letter->id => $letter->lastname . ' ' . $letter->firstname];
                        });
                    })
                    ->native(false)
                    ->required(),

                Forms\Components\Select::make('newsletter_id')
                    ->label('Newsletter')
                    ->options(function () {
                        return Newsletter::all()->mapWithKeys(function ($letter) {
                            return [$letter->id => $letter->title];
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
                Tables\Columns\TextColumn::make('newsletterSubscriber.email')
                    ->label('Email')
                    ->sortable(),
                Tables\Columns\TextColumn::make('newsletter.title')
                    ->label('Title Message'),
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
            'index' => Pages\ListNewsletterHistories::route('/'),
            'create' => Pages\CreateNewsletterHistory::route('/create'),
            'edit' => Pages\EditNewsletterHistory::route('/{record}/edit'),
        ];
    }
}
