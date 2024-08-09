<?php

namespace App\Filament\Resources\TypesPrestationResource\Pages;

use App\Filament\Resources\TypesPrestationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypesPrestation extends CreateRecord
{
    protected static string $resource = TypesPrestationResource::class;


    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
