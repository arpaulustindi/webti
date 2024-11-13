<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdiKurikulumResource\Pages;
use App\Filament\Resources\ProdiKurikulumResource\RelationManagers;
use App\Models\ProdiKurikulum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class ProdiKurikulumResource extends Resource
{
    protected static ?string $model = ProdiKurikulum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Prodi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('semester')
                    ->required()
                    ->numeric(),
                Select::make('jenis')
                    ->options([
                        'Umum' => 'Umum',
                        'Jurusan' => 'Jurusan',
                    ]),
                Select::make('rumpun')
                    ->options([
                        'Inti / Khas' => 'Inti / Khas',
                        'Domain Spesifik' => 'Domain Spesifik',
                        'Kualitatif & Kuantitatif' => 'Kualitatif & Kuantitatif',
                        'Proyek Utaram' => 'Proyek Utama',
                        'Umum' => 'Umum'
                    ]),
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mata_kuliah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('teori')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('praktek')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rps')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('modul')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('semester')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rumpun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mata_kuliah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('teori')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('praktek')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rps')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modul')
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
            'index' => Pages\ListProdiKurikulums::route('/'),
            'create' => Pages\CreateProdiKurikulum::route('/create'),
            'edit' => Pages\EditProdiKurikulum::route('/{record}/edit'),
        ];
    }
}
