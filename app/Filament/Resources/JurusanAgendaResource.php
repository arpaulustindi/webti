<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanAgendaResource\Pages;
use App\Filament\Resources\JurusanAgendaResource\RelationManagers;
use App\Models\JurusanAgenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Filament\Forms\Components\RichEditor;

class JurusanAgendaResource extends Resource
{
    protected static ?string $model = JurusanAgenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Jurusan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $operation, ?string $old, ?string $state, ?JurusanAgenda $record) {

                        if ($operation == 'edit' && $record->isPublished()) {
                            return;
                        }

                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('agenda')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('mulai')
                    ->required()
                    ->default(now()),
                Forms\Components\Toggle::make('running')
                    ->required(),
                Forms\Components\Toggle::make('aktif')
                    ->required(),
                Forms\Components\Toggle::make('selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('running')
                    ->boolean(),
                Tables\Columns\IconColumn::make('aktif')
                    ->boolean(),
                Tables\Columns\IconColumn::make('selesai')
                    ->boolean(),
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
            'index' => Pages\ListJurusanAgendas::route('/'),
            'create' => Pages\CreateJurusanAgenda::route('/create'),
            'edit' => Pages\EditJurusanAgenda::route('/{record}/edit'),
        ];
    }
}
