<?php

namespace App\Filament\Pages;

use App\Models\JurusanFasilitas;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\RichEditor;


class EditJurusanFasilitas extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-jurusan-fasilitas';
    protected static ?string $navigationGroup = 'Jurusan';
    protected static ?string $navigationLabel = 'Edit Fasilitas Jurusan';

    public ?array $data = [];
    public string $deskripsi = '';
    public ?int $jurusanFasilitasId = null;

    // Method to load existing data or create a new record if it doesn't exist
    public function mount(): void
    {
        // Attempt to find the first (and only) record in the table
        $jurusanFasilitas = JurusanFasilitas::first();

        if ($jurusanFasilitas) {
            // If the record exists, fill the form with its data
            $this->jurusanFasilitasId = $jurusanFasilitas->id;
            $this->deskripsi = $jurusanFasilitas->deskripsi;

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

            if ($this->jurusanFasilitasId) {
                // If the record exists, update it
                $jurusanFasilitas = JurusanFasilitas::find($this->jurusanFasilitasId);
                if ($jurusanFasilitas) {
                    $jurusanFasilitas->update([
                        'deskripsi' => $data['deskripsi'],
                    ]);
                }
            } else {
                // If no record exists, create a new one
                JurusanFasilitas::create([
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
