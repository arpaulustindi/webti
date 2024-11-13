<?php

namespace App\Filament\Resources\AlumniTracerResource\Pages;

use App\Filament\Resources\AlumniTracerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumniTracer extends EditRecord
{
    protected static string $resource = AlumniTracerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
