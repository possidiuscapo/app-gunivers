<?php

namespace App\Filament\Resources\NewsletterHistoryResource\Pages;

use App\Filament\Resources\NewsletterHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterHistories extends ListRecords
{
    protected static string $resource = NewsletterHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
