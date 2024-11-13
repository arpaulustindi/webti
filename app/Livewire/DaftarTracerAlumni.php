<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use App\Models\AlumniPenggunaLulusan;
use App\Models\AlumniTracer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;


class DaftarTracerAlumni extends Component implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }
    public function render()
    {
        return view('livewire.daftar-tracer-alumni');
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Lengkap'),
                Select::make('tahun_masuk')
                    ->required()
                    ->options([
                        '2015' => '2015',
                        '2016' => '2016',
                        '2017' => '2017',
                        '2018' => '2018',
                        '2019' => '2019',
                        '2020' => '2020',
                        '2021' => '2021',
                    ])
                    ->label('Tahun Masuk Polnustar'),
                Select::make('tahun_lulus')
                    ->required()
                    ->options([
                        '2018' => '2018',
                        '2019' => '2019',
                        '2020' => '2020',
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                    ])
                    ->label('Tahun Lulus Polnustar'),
                TextInput::make('nim')
                    ->maxLength(255)
                    ->label('NIM')
                    ->helperText('Apabila Tidak Diingat, Bisa Dikosongkan'),
                TextInput::make('waktu_tunggu')
                    ->required()
                    ->numeric()
                    ->minValue(-12)
                    ->maxValue(18)
                    ->step(1)
                    ->label('Waktu Tunggu Pekerjaan/Usaha Dalam Hitungan Bulan Sebelum/Setelah Wisuda')
                    ->helperText('1) Apabila Setelah Wisuda Langsung Bekerja maka Diisi 0; 2) Apabila Sebelum Wisuda Sudah Bekerja maka Diisi Dengan - (mines) contoh : -2; 3) Apabila melebihi 18 bulan, diisi dengan 18 (Maksimal 18 Bulan)'),
                TextInput::make('kantor')
                    ->maxLength(255)
                    ->required()
                    ->label('Nama Kantor/Tempat Usaha')
                    ->helperText('Apabila Kantor/Tempat Usaha Tidak Memiliki Nama, Dapat Ditulis Jenis Kantor/Tempat Usaha Saja'),
                Select::make('lingkup')
                    ->required()
                    ->options([
                        'Multi Nasional/Internasional' => 'Multi Nasional/Internasional',
                        'Nasional' => 'Nasional',
                        'Wirausaha' => 'Wirausaha',
                    ])
                    ->label('Ruang Lingkup Kantor/Tempat Usaha'),
                Select::make('bidang')
                    ->required()
                    ->options([
                        'Profesi Bidang Infokom' => 'Profesi Bidang Infokom',
                        'Profesi Bidang Non Infokom' => 'Profesi Bidang Non Infokom',
                    ])
                    ->label('Bidang Pekerjaan')
                    ->helperText('Bidang Pekerjaan Yang Dilakukan Pada Kantor/Tempat Usaha'),
                Radio::make('penetrasi')
                    ->options([
                        '0' => 'Tidak Pernah',
                        '1' => 'Jarang',
                        '2' => 'Sering',
                        '3' => 'Selalu'
                    ])

                    ->label('Penetrasi Teknologi')
                    ->helperText('Penetrasi atau Penggunaan Teknologi Bidang TI/SI dalam melakukan Pekerjaan/menjalankan Usaha'),
                PhoneInput::make('hp')
                    ->helperText('Nomor HP Aktif, Apabila Tidak Berkenan, Bisa Dikosongkan'),
                Textarea::make('domisili')
                    ->helperText('Domisili Saat Ini, Apabila Tidak Berkenan, Bisa Dikosongkan')
                // ...
            ])
            ->statePath('data')
            ->model(AlumniTracer::class);;
    }

    public function create(): void
    {
        AlumniTracer::create($this->form->getState());
    }
}
