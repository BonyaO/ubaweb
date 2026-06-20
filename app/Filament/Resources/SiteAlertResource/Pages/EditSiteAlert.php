<?php

namespace App\Filament\Resources\SiteAlertResource\Pages;

use App\Filament\Resources\SiteAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteAlert extends EditRecord
{
    protected static string $resource = SiteAlertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
