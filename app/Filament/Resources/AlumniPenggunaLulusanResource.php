<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniPenggunaLulusanResource\Pages;
use App\Filament\Resources\AlumniPenggunaLulusanResource\RelationManagers;
use App\Models\AlumniPenggunaLulusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumniPenggunaLulusanResource extends Resource
{
    protected static ?string $model = AlumniPenggunaLulusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Mahasiswa';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tipe_lembaga')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_lembaga')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pimpinan_lembaga')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_alumni')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_bekerja')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_kerjasama_tim')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_keahlian_ti')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_bahasa_asing')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_komunikasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_pengembangan_diri')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_kepemimpinan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('n_etos_kerja')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe_lembaga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_lembaga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pimpinan_lembaga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_alumni')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_bekerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_kerjasama_tim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_keahlian_ti')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_bahasa_asing')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_komunikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_pengembangan_diri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_kepemimpinan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n_etos_kerja')
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
            'index' => Pages\ListAlumniPenggunaLulusans::route('/'),
            'create' => Pages\CreateAlumniPenggunaLulusan::route('/create'),
            'edit' => Pages\EditAlumniPenggunaLulusan::route('/{record}/edit'),
        ];
    }
}
