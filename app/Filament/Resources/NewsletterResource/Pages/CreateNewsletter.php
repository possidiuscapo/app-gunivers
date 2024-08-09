<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use App\Filament\Resources\NewsletterResource;
use Filament\Actions;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsletter extends CreateRecord
{
    protected static string $resource = NewsletterResource::class;

    protected function getRedirectUrl(): string
    {
        Log::info('Redirection vers la vue de listage après la création.');
        // Redirige vers la vue de listage après la création
        return $this->getResource()::getUrl('index');
    }
}
