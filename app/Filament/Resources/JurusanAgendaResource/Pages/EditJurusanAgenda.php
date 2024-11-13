<?php

namespace App\Filament\Resources\JurusanAgendaResource\Pages;

use App\Filament\Resources\JurusanAgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJurusanAgenda extends EditRecord
{
    protected static string $resource = JurusanAgendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
