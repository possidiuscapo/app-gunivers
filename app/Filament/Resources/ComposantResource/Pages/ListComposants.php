<?php

namespace App\Filament\Resources\ComposantResource\Pages;

use App\Filament\Resources\ComposantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComposants extends ListRecords
{
    protected static string $resource = ComposantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
