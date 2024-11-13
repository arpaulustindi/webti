<?php

namespace App\Filament\Pages;

use App\Models\JurusanSambutan;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class EditJurusanSambutan extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.edit-jurusan-sambutan';
    protected static ?string $navigationGroup = 'Jurusan';
    protected static ?string $navigationLabel = 'Edit Sambutan Kajur';

    public ?array $data = [];
    public string $gambar = '';
    public string $sambutan = '';
    public ?int $jurusanSambutanId = null;

    // Method to load existing data or create a new record if it doesn't exist
    public function mount(): void
    {
        // Attempt to find the first (and only) record in the table
        $jurusanSambutan = JurusanSambutan::first();

        if ($jurusanSambutan) {
            // If the record exists, fill the form with its data
            $this->jurusanSambutanId = $jurusanSambutan->id;
            $this->gambar = $jurusanSambutan->gambar;
            $this->sambutan = $jurusanSambutan->sambutan;

        } else {
            // If no record exists, initialize empty fields
            $this->gambar = '';
            $this->sambutan = '';
        }

        $this->form->fill([
            'gambar' => $this->gambar,
            'sambutan' => $this->sambutan,
        ]);
    }

    // Define the form schema
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar')
                    ->image()
                    ->label('Gambar')
                    ->required()
                    ->default($this->gambar), // Set the default value if editing an existing record

                RichEditor::make('sambutan')
                    ->label('Sambutan')
                    ->required()
                    ->default($this->sambutan), // Set the default value if editing an existing record
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

            if ($this->jurusanSambutanId) {
                // If the record exists, update it
                $jurusanSambutan = JurusanSambutan::find($this->jurusanSambutanId);
                if ($jurusanSambutan) {
                    $jurusanSambutan->update([
                        'gambar' => $data['gambar'],
                        'sambutan' => $data['sambutan'],
                    ]);
                }
            } else {
                // If no record exists, create a new one
                JurusanSambutan::create([
                    'gambar' => $data['gambar'],
                    'sambutan' => $data['sambutan'],
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
