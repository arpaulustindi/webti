<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabAsetResource\Pages;
use App\Filament\Resources\LabAsetResource\RelationManagers;
use App\Models\LabAset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class LabAsetResource extends Resource
{
    protected static ?string $model = LabAset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Lab';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_pengadaan')
                    ->required()
                    ->numeric(),
                Select::make('pembiayaan')
                    ->options([
                        'APBN' => 'APBN',
                        'Hibah' => 'Hibah',
                        'BOPTN' => 'BOPTN',
                        'Rupiah Murni' => 'Rupiah Murni',
                        'PNBP' => 'PNBP',
                        'Lainnya' => 'Lainnya',
                    ]),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                Select::make('satuan')
                    ->options([
                        'Dos' => 'Dos',
                        'Meter' => 'Meter',
                        'Pcs' => 'Pcs',
                        'Unit' => 'Unit',
                        'Set' => 'Set',
                    ]),
                Radio::make('kondisi')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak' => 'Rusak',
                    ]),
                RichEditor::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('foto')
                    ->image()
                    ->imageEditor()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')->square(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_pengadaan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pembiayaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('satuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kondisi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Rusak' => 'danger',
                    }),
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
            'index' => Pages\ListLabAsets::route('/'),
            'create' => Pages\CreateLabAset::route('/create'),
            'edit' => Pages\EditLabAset::route('/{record}/edit'),
        ];
    }
}
