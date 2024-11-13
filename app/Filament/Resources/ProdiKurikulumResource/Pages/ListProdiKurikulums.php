<?php

namespace App\Filament\Resources\ProdiKurikulumResource\Pages;

use App\Filament\Resources\ProdiKurikulumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdiKurikulums extends ListRecords
{
    protected static string $resource = ProdiKurikulumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
