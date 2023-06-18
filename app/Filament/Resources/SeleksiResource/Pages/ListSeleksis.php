<?php

namespace App\Filament\Resources\SeleksiResource\Pages;

use App\Filament\Resources\SeleksiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeleksis extends ListRecords
{
    protected static string $resource = SeleksiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}