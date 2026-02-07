<?php

namespace App\Filament\Widgets;

use App\Models\Artikel;
use App\Models\Category;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel', Artikel::count())
                ->description('Semua artikel yang ada')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            
            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah kategori')
                ->descriptionIcon('heroicon-m-folder')
                ->color('primary'),

            Stat::make('Total User', User::count())
                ->description('Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}
