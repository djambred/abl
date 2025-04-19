<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class ProductCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->description('Number of products in the system')
                ->color('success')
                ->icon('heroicon-o-cube'),
        ];
    }
}
