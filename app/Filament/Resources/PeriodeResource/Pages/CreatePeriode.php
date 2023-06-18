<?php

namespace App\Filament\Resources\PeriodeResource\Pages;

use App\Filament\Resources\PeriodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeriode extends CreateRecord
{
    protected static string $resource = PeriodeResource::class;
    protected function getredirecturl(): string {
        return $this->getresource()::geturl('index');
    }
}
