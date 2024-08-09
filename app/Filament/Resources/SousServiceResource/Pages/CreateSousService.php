<?php

namespace App\Filament\Resources\SousServiceResource\Pages;

use App\Filament\Resources\SousServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSousService extends CreateRecord
{
    protected static string $resource = SousServiceResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
