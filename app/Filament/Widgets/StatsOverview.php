<?php

namespace App\Filament\Widgets;

use App\Models\Formation;
use App\Models\FormationSubscriber;
use App\Models\NewsletterSubscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected static ?int $sort = 2;


    protected function getStats(): array
    {
        return [
            Stat::make('Total Formation', Formation::count()),
            Stat::make('Total Newsletter Subscribe', NewsletterSubscriber::count()),
            Stat::make('Total Formation Subscribe', FormationSubscriber::count()),
        ];
    }
}
