<?php

namespace App\Filament\Resources\TypesPrestationResource\Pages;

use App\Filament\Resources\TypesPrestationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypesPrestations extends ListRecords
{
    protected static string $resource = TypesPrestationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
