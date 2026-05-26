<?php

namespace App\Filament\Widgets;

use App\Models\QuoteRequest;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class QuoteRequestStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = QuoteRequest::count();
        $new = QuoteRequest::where('status', 'new')->count();
        $read = QuoteRequest::where('status', 'read')->count();
        $replied = QuoteRequest::where('status', 'replied')->count();
        $charter = QuoteRequest::where('service_type', 'charter')->count();
        $transfer = QuoteRequest::where('service_type', 'transfer')->count();
        $tour = QuoteRequest::where('service_type', 'tour')->count();
        $avgDistance = QuoteRequest::whereNotNull('distance_km')->avg('distance_km');
        $avgDuration = QuoteRequest::whereNotNull('duration_minutes')->avg('duration_minutes');

        return [
            Stat::make('Total Quotes', (string) $total)
                ->description('All quote requests received')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),
            Stat::make('New Quotes', (string) $new)
                ->description('Unprocessed requests')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
            Stat::make('Read Quotes', (string) $read)
                ->description('Opened by admin')
                ->descriptionIcon('heroicon-m-envelope-open')
                ->color('warning'),
            Stat::make('Replied Quotes', (string) $replied)
                ->description('Completed responses')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Charter Quotes', (string) $charter)
                ->description('Private coach requests')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),
            Stat::make('Transfer Quotes', (string) $transfer)
                ->description('Airport, hotel, and city transfers')
                ->descriptionIcon('heroicon-m-arrows-right-left')
                ->color('info'),
            Stat::make('Tour Quotes', (string) $tour)
                ->description('Destination and sightseeing requests')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('warning'),
            Stat::make('Avg Distance', $avgDistance ? number_format($avgDistance, 1) . ' km' : '0 km')
                ->description('Tracked route requests')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('gray'),
            Stat::make('Avg Duration', $avgDuration ? floor($avgDuration / 60) . 'h ' . ($avgDuration % 60) . 'm' : '0m')
                ->description('Estimated trip time')
                ->descriptionIcon('heroicon-m-clock')
                ->color('gray'),
        ];
    }
}
