<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormationSubscriberResource\Pages;
use App\Filament\Resources\FormationSubscriberResource\RelationManagers;
use App\Models\Formation;
use App\Models\FormationSubscriber;
use App\Models\Pays;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormationSubscriberResource extends Resource
{
    protected static ?string $model = FormationSubscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = "Offres";

    protected static ?string $navigationLabel = "Formation Subscribers";


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
                    ->label('Nom')
                    ->placeholder('Entrer votre nom'),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->label('Prénom(s)')
                    ->placeholder('Entrer vos/votre prénom(s)'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email')
                    ->placeholder('Entrer votre email'),
                Forms\Components\TextInput::make('profession')
                    ->required()
                    ->label('Profession')
                    ->placeholder('Entrer votre profession'),
                Forms\Components\TextInput::make('residence')
                    ->required()
                    ->label('Résidence')
                    ->placeholder('Adresse de résidence'),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->label('Téléphone')
                    ->placeholder('Numéro de téléphone'),
                Forms\Components\Select::make('education_level')
                    ->required()
                    ->options([
                        'primaire' => 'Primaire',
                        'secondaire' => 'Secondaire',
                        'bac' => 'Baccalauréat',
                        'licence' => 'Licence',
                        'master' => 'Master',
                        'doctorat' => 'Doctorat',
                    ])
                    ->native(false)
                    ->placeholder('Sélectionnez le niveau d\'étude'),
                Forms\Components\TextInput::make('last_institution')
                    ->nullable()
                    ->label('Dernier Établissement')
                    ->placeholder('Dernier établissement fréquenté'),

                Forms\Components\RichEditor::make('professional_skills')
                    ->label('Aptitude Professionnelle')
                    ->nullable()
                    ->columnSpan('full')
                    ->placeholder('Citer si possible vos aptitudes'),

                Forms\Components\RichEditor::make('motivation')
                    ->label('Motivation')
                    ->nullable()
                    ->columnSpan('full')
                    ->placeholder('Entrer vos/votre motivation'),

                Forms\Components\TextInput::make('emergency_contact_name')
                    ->required()
                    ->label('Personne à Contacter en Urgence')
                    ->placeholder('Entrer le nom et prénom'),

                Forms\Components\TextInput::make('emergency_contact_phone')
                    ->tel()
                    ->required()
                    ->label('Contact Urgence')
                    ->placeholder('Numéro Contact en urgence'),

                Forms\Components\Select::make('emergency_contact_relationship')
                    ->label('Lien de Parenté Urgence')
                    ->required()
                    ->options([
                        'pere' => 'Père',
                        'mere' => 'Mère',
                        'frere' => 'Frère',
                        'soeur' => 'Sœur',
                        'oncle' => 'Oncle',
                        'tante' => 'Tante',
                        'cousin' => 'Cousin',
                        'cousine' => 'Cousine',
                        'ami' => 'Ami(e)',
                        'autre' => 'Autres',
                    ])
                    ->native(false)
                    ->placeholder('Sélectionner le lien de parenté'),

                Forms\Components\TextInput::make('emergency_contact_address')
                    ->required()
                    ->label('Adresse Personne en Urgence')
                    ->placeholder('Adresse'),

                Forms\Components\TextInput::make('social_disability')
                    ->label('Handicap Social')
                    ->placeholder('Si oui, entrer le type d\'handicap social, ')
                    ->helperText(str('Si aucun handicap, écrire **Aucun**.')->inlineMarkdown()->toHtmlString()),

                Forms\Components\Select::make('marital_status')
                    ->label('Situation Matrimoniale')
                    ->required()
                    ->options([
                        'celibataire' => 'Célibataire',
                        'marie' => 'Marié(e)',
                        'pacse' => 'Pacsé(e)',
                        'concubin' => 'Concubin(e)',
                        'divorce' => 'Divorcé(e)',
                        'veuf' => 'Veuf/Veuve',
                        'separe' => 'Séparé(e)',
                        'fiance' => 'Fiancé(e)',
                    ])
                    ->native(false)
                    ->placeholder('Sélectionnez votre situation matrimoniale'),


                Forms\Components\Radio::make('has_children')
                    ->label('Avez-vous des enfants ?')
                    ->boolean()
                    ->inline()
                    ->inlineLabel(false),

                Forms\Components\TextInput::make('number_of_children')
                    ->numeric()
                    ->label('Si Oui, combien ?'),

                Forms\Components\RichEditor::make('referral_source')
                    ->label('Comment Avez-Vous Connu Gunivers')
                    ->nullable()
                    ->columnSpan('full'),

                Forms\Components\RichEditor::make('future_plans')
                    ->label('Votre Projet dans 2 Ans')
                    ->nullable()
                    ->columnSpan('full'),

                Forms\Components\Select::make('formation_id')
                    ->label('Formation')
                    ->options(function () {
                        return Formation::all()->mapWithKeys(function ($formation) {
                            return [$formation->id => $formation->name];
                        });
                    })
                    ->native(false)
                    ->required(),

                Forms\Components\Select::make('pays_id')
                    ->label('Pays')
                    ->options(function () {
                        return Pays::all()->mapWithKeys(function ($pays) {
                            return [$pays->id => $pays->name];
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
                Tables\Columns\TextColumn::make('lastname')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profession'),
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
            'index' => Pages\ListFormationSubscribers::route('/'),
            'create' => Pages\CreateFormationSubscriber::route('/create'),
            'edit' => Pages\EditFormationSubscriber::route('/{record}/edit'),
        ];
    }
}
