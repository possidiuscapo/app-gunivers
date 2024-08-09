<?php

namespace App\Filament\Resources\PrestationResource\Pages;

use App\Filament\Resources\PrestationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrestation extends CreateRecord
{
    protected static string $resource = PrestationResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
