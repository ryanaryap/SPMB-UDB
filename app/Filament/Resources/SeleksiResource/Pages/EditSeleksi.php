<?php

namespace App\Filament\Resources\SeleksiResource\Pages;

use App\Filament\Resources\SeleksiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeleksi extends EditRecord
{
    protected static string $resource = SeleksiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
