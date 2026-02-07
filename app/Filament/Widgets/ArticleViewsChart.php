<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Artikel;
use Carbon\Carbon;

class ArticleViewsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Views Statistics';

    protected function getData(): array
    {
        $totalViews = Artikel::sum('view');
        
        // Sum of views for articles created in the last 30 days
        $viewsFromRecentArticles = Artikel::where('created_at', '>=', Carbon::now()->subDays(30))->sum('view');

        return [
            'datasets' => [
                [
                    'label' => 'Total Views',
                    'data' => [$totalViews, $viewsFromRecentArticles],
                    'backgroundColor' => ['#36A2EB', '#FF6384'],
                ],
            ],
            'labels' => ['All Time Views', 'Views (New Articles)'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
