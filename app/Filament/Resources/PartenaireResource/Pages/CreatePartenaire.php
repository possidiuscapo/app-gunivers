<?php

namespace App\Filament\Resources\PartenaireResource\Pages;

use App\Filament\Resources\PartenaireResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartenaire extends CreateRecord
{
    protected static string $resource = PartenaireResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
