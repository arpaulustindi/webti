<?php

namespace App\Filament\Resources\AlumniPenggunaLulusanResource\Pages;

use App\Filament\Resources\AlumniPenggunaLulusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumniPenggunaLulusans extends ListRecords
{
    protected static string $resource = AlumniPenggunaLulusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
