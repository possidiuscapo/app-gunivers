<?php

namespace App\Filament\Resources\ServiceSousServiceResource\Pages;

use App\Filament\Resources\ServiceSousServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceSousService extends CreateRecord
{
    protected static string $resource = ServiceSousServiceResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
