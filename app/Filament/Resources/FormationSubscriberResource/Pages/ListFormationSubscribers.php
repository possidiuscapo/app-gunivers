<?php

namespace App\Filament\Resources\FormationSubscriberResource\Pages;

use App\Filament\Resources\FormationSubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormationSubscribers extends ListRecords
{
    protected static string $resource = FormationSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
