<?php

namespace App\Filament\Resources\ComposantResource\Pages;

use App\Filament\Resources\ComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComposant extends EditRecord
{
    protected static string $resource = ComposantResource::class;

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
