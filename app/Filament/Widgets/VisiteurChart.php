<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\NewsletterSubscriber;
use App\Models\NewsletterUnsubscription;
use Filament\Widgets\ChartWidget;

class VisiteurChart extends ChartWidget
{

    protected static ?string $heading = 'Bilan Visiteur';

    protected static ?string $pollingInterval = '15s';

    protected static ?int $sort = 5;

    protected function getData(): array
    {

        $data = $this->getVisitorData();

        return [
            'labels' => ['Contacts', 'Newsletter', 'Newsletter Subscriber', 'Newsletter Unsubscription'],
            'datasets' => [
                [
                    'label' => 'Packs',
                    'data' => $data, 
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                ],
            ],
            'options' => [
                'maintainAspectRatio' => false,
                'responsive' => true,
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }


    private function getVisitorData(): array
    {
        // Récupérer les données des modèles
        $contactsCount = Contact::count();
        $newsletterCount = Newsletter::count();
        $newsletterSubscriberCount = NewsletterSubscriber::count();
        $newsletterUnsubscriptionCount = NewsletterUnsubscription::count();

        // Retourner les données sous forme de tableau
        return [
            $contactsCount,
            $newsletterCount,
            $newsletterSubscriberCount,
            $newsletterUnsubscriptionCount,
        ];
    }
}
