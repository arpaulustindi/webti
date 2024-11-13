<?php

namespace App\Filament\Resources\AlumniTracerResource\Pages;

use App\Filament\Resources\AlumniTracerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListAlumniTracers extends ListRecords
{
    protected static string $resource = AlumniTracerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->color("primary"),
            Actions\CreateAction::make(),


        ];
    }
}
