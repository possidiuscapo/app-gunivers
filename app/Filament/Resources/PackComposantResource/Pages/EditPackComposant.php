<?php

namespace App\Filament\Resources\PackComposantResource\Pages;

use App\Filament\Resources\PackComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackComposant extends EditRecord
{
    protected static string $resource = PackComposantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
