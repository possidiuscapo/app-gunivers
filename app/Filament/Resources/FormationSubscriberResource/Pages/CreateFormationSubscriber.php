<?php

namespace App\Filament\Resources\FormationSubscriberResource\Pages;

use App\Filament\Resources\FormationSubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFormationSubscriber extends CreateRecord
{
    protected static string $resource = FormationSubscriberResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
