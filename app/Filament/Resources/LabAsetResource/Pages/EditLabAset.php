<?php

namespace App\Filament\Resources\LabAsetResource\Pages;

use App\Filament\Resources\LabAsetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLabAset extends EditRecord
{
    protected static string $resource = LabAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
