<?php

namespace App\Filament\Resources\SeleksiResource\Pages;

use App\Filament\Resources\SeleksiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSeleksi extends CreateRecord
{
    protected static string $resource = SeleksiResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
    
     
}
