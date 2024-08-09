<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestationResource\Pages;
use App\Filament\Resources\PrestationResource\RelationManagers;
use App\Models\Prestation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PrestationResource extends Resource
{
    protected static ?string $model = Prestation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = "Blog";

    protected static ?string $navigationLabel = "Prestations";



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

                Forms\Components\TextInput::make('subtitle')
                    ->placeholder('Sous titre de la prestation'),

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
                    ->disk('prestation')
                    ->visibility('public')
                    ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->description),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('prestation'),
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
            'index' => Pages\ListPrestations::route('/'),
            'create' => Pages\CreatePrestation::route('/create'),
            'edit' => Pages\EditPrestation::route('/{record}/edit'),
        ];
    }
}
