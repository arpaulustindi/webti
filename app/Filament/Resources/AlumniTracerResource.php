<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniTracerResource\Pages;
use App\Filament\Resources\AlumniTracerResource\RelationManagers;
use App\Models\AlumniTracer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AlumniTracerResource extends Resource
{

    protected static ?string $model = AlumniTracer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Mahasiswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_masuk')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tahun_lulus')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('waktu_tunggu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kantor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lingkup')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bidang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penetrasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('domisili')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_masuk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waktu_tunggu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kantor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lingkup')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bidang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penetrasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domisili')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                ]),
                ExportBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumniTracers::route('/'),
            'create' => Pages\CreateAlumniTracer::route('/create'),
            'edit' => Pages\EditAlumniTracer::route('/{record}/edit'),
        ];
    }
}
