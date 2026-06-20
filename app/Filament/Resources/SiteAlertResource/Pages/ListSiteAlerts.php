<?php

namespace App\Filament\Resources\SiteAlertResource\Pages;

use App\Filament\Resources\SiteAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteAlerts extends ListRecords
{
    protected static string $resource = SiteAlertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
