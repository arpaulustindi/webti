<?php

namespace App\Filament\Pages;

use App\Models\JurusanMerdekaBelajar;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\RichEditor;


class EditJurusanMerdekaBelajar extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-jurusan-merdeka-belajar';
    protected static ?string $navigationGroup = 'Jurusan';
    protected static ?string $navigationLabel = 'Edit Merdeka Belajar Jurusan';

    public ?array $data = [];
    public string $deskripsi = '';
    public ?int $jurusanMerdekaBelajarId = null;

    // Method to load existing data or create a new record if it doesn't exist
    public function mount(): void
    {
        // Attempt to find the first (and only) record in the table
        $jurusanMerdekaBelajar = JurusanMerdekaBelajar::first();

        if ($jurusanMerdekaBelajar) {
            // If the record exists, fill the form with its data
            $this->jurusanMerdekaBelajarId = $jurusanMerdekaBelajar->id;
            $this->deskripsi = $jurusanMerdekaBelajar->deskripsi;

        } else {
            // If no record exists, initialize empty fields
            $this->deskripsi = '';
        }

        $this->form->fill([
            'deskripsi' => $this->deskripsi,
        ]);
    }

    // Define the form schema
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->default($this->deskripsi), // Set the default value if editing an existing record
            ])
            ->statePath('data');
    }

    // Define actions for the form
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    // Save method to either create a new record or update the existing one
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            if ($this->jurusanMerdekaBelajarId) {
                // If the record exists, update it
                $jurusanMerdekaBelajar = JurusanMerdekaBelajar::find($this->jurusanMerdekaBelajarId);
                if ($jurusanMerdekaBelajar) {
                    $jurusanMerdekaBelajar->update([
                        'deskripsi' => $data['deskripsi'],
                    ]);
                }
            } else {
                // If no record exists, create a new one
                JurusanMerdekaBelajar::create([
                    'deskripsi' => $data['deskripsi'],
                ]);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
