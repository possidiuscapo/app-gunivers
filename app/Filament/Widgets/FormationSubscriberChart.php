<?php

namespace App\Filament\Widgets;

use App\Models\FormationSubscriber;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class FormationSubscriberChart extends ChartWidget
{
    protected static ?string $heading = 'Bilan Formation';

    protected static ?string $pollingInterval = '15s';

    protected static ?int $sort = 4;



    protected function getData(): array
    {

        $data = $this->getFormationSubscribePerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Nbre de souscription',
                    'data' => $data['formationSubscriberPerMonth'],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }


    private function getFormationSubscribePerMonth(): array
    {
        $now = Carbon::now();
        $formationSubscriberPerMonth = [];

        $months = collect(range(1, 12))->map(function ($month) use ($now, &$formationSubscriberPerMonth) {
            $startOfMonth = Carbon::create($now->year, $month, 1)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $count = FormationSubscriber::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

            $formationSubscriberPerMonth[] = $count;

            return $startOfMonth->format('M');
        })->toArray();

        return [
            'formationSubscriberPerMonth' => $formationSubscriberPerMonth,
            'months' => $months,
        ];
    }
}
