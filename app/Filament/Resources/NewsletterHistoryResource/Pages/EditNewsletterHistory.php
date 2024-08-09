<?php

namespace App\Filament\Resources\NewsletterHistoryResource\Pages;

use App\Filament\Resources\NewsletterHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterHistory extends EditRecord
{
    protected static string $resource = NewsletterHistoryResource::class;

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
