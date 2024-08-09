<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SousServiceResource\Pages;
use App\Filament\Resources\SousServiceResource\RelationManagers;
use App\Models\SousService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class SousServiceResource extends Resource
{
    protected static ?string $model = SousService::class;

    protected static ?string $navigationIcon = 'heroicon-c-bars-arrow-down';

    protected static ?string $navigationGroup = "Offres";

    protected static ?string $navigationLabel = "Sous Services";



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
                    ->columnSpan('full')
                    ->placeholder('Nom du sous service'),
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
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('sousservice')
                    ->visibility('public')
                    ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->description),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('sousservice'),
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
            'index' => Pages\ListSousServices::route('/'),
            'create' => Pages\CreateSousService::route('/create'),
            'edit' => Pages\EditSousService::route('/{record}/edit'),
        ];
    }
}
