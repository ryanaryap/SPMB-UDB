<?php

namespace App\Filament\Resources\PeriodeResource\Pages;

use App\Filament\Resources\PeriodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodes extends ListRecords
{
    protected static string $resource = PeriodeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
