<?php

namespace App\Filament\Resources\JurusanAgendaResource\Pages;

use App\Filament\Resources\JurusanAgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJurusanAgendas extends ListRecords
{
    protected static string $resource = JurusanAgendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
