<?php

namespace App\Filament\Resources\PackComposantResource\Pages;

use App\Filament\Resources\PackComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackComposants extends ListRecords
{
    protected static string $resource = PackComposantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
