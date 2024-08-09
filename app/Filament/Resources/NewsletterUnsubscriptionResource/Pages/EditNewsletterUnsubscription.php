<?php

namespace App\Filament\Resources\NewsletterUnsubscriptionResource\Pages;

use App\Filament\Resources\NewsletterUnsubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterUnsubscription extends EditRecord
{
    protected static string $resource = NewsletterUnsubscriptionResource::class;

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
