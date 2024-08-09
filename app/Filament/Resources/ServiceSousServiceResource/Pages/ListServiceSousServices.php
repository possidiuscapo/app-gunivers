<?php

namespace App\Filament\Resources\ServiceSousServiceResource\Pages;

use App\Filament\Resources\ServiceSousServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceSousServices extends ListRecords
{
    protected static string $resource = ServiceSousServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
