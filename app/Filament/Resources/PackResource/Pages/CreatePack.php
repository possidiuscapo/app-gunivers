<?php

namespace App\Filament\Resources\PackResource\Pages;

use App\Filament\Resources\PackResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePack extends CreateRecord
{
    protected static string $resource = PackResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
