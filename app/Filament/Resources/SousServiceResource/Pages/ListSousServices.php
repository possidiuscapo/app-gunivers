<?php

namespace App\Filament\Resources\SousServiceResource\Pages;

use App\Filament\Resources\SousServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSousServices extends ListRecords
{
    protected static string $resource = SousServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
