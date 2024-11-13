<?php

namespace App\Filament\Resources\ProdiKurikulumResource\Pages;

use App\Filament\Resources\ProdiKurikulumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdiKurikulum extends EditRecord
{
    protected static string $resource = ProdiKurikulumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
