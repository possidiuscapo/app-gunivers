<?php

namespace App\Filament\Resources\NewsletterUnsubscriptionResource\Pages;

use App\Filament\Resources\NewsletterUnsubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterUnsubscriptions extends ListRecords
{
    protected static string $resource = NewsletterUnsubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
