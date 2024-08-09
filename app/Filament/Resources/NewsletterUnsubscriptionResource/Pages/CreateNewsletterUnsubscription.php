<?php

namespace App\Filament\Resources\NewsletterUnsubscriptionResource\Pages;

use App\Filament\Resources\NewsletterUnsubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsletterUnsubscription extends CreateRecord
{
    protected static string $resource = NewsletterUnsubscriptionResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
