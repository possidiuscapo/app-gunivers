<?php

namespace App\Filament\Resources\PackComposantResource\Pages;

use App\Filament\Resources\PackComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePackComposant extends CreateRecord
{
    protected static string $resource = PackComposantResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
