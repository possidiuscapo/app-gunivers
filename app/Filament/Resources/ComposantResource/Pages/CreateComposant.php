<?php

namespace App\Filament\Resources\ComposantResource\Pages;

use App\Filament\Resources\ComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComposant extends CreateRecord
{
    protected static string $resource = ComposantResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
