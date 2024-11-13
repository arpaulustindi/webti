<?php

namespace App\Filament\Resources\AlumniPenggunaLulusanResource\Pages;

use App\Filament\Resources\AlumniPenggunaLulusanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumniPenggunaLulusan extends EditRecord
{
    protected static string $resource = AlumniPenggunaLulusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
