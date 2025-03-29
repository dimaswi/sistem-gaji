<?php

namespace App\Filament\Gaji\Resources\PegawaiResource\Pages;

use App\Filament\Gaji\Resources\PegawaiResource;
use App\Models\Penghasilan;
use App\Models\Potongan;
use Carbon\Carbon;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Collection;

class ListPegawais extends ListRecords
{
    protected static string $resource = PegawaiResource::class;

    protected static ?string $title = 'Pegawai';

    protected function getHeaderActions(): array
    {
        if (auth()->user()->nip === '2014.10.09.062' OR auth()->user()->nip === '2023.01.12.162') {
            return [
                Action::make('hapus')
                    ->label('Hapus')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->form([
                        Select::make('month')
                            ->label('Bulan')
                            ->searchable()
                            ->options(
                                [
                                    '01' => 'Januari',
                                    '02' => 'Februari',
                                    '03' => 'Maret',
                                    '04' => 'April',
                                    '05' => 'Mei',
                                    '06' => 'Juni',
                                    '07' => 'Juli',
                                    '08' => 'Agustus',
                                    '09' => 'September',
                                    '10' => 'Oktober',
                                    '11' => 'November',
                                    '12' => 'Desember',
                                ]
                            )
                            ->required(),
                    ])
                    ->action(
                        function (array $data) {
                            try {
                                Penghasilan::whereMonth('created_at', $data['month'])
                                    ->delete();
                                Potongan::whereMonth('created_at', $data['month'])
                                    ->delete();

                                Notification::make()
                                    ->title('Berhasil!')
                                    ->body('Data Gaji Bulan ' . $data['month'] . ' Berhasil Dihapus!')
                                    ->success()
                                    ->send();
                            } catch (\Throwable $th) {
                                return Notification::make()
                                    ->title('Gagal!')
                                    ->body($th->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }
                    ),
                ExcelImportAction::make()
                    ->color("warning")
                    ->processCollectionUsing(function (string $modelClass, Collection $collection) {
                        try {
                            $data_penghasilan = Penghasilan::whereMonth('created_at', Carbon::now('Asia/Jakarta')->format('m'))->get();

                            if ($data_penghasilan->count() == 0) {
                                foreach ($collection as $key => $value) {

                                    Penghasilan::create([
                                        'nomor_induk_pegawai' => $value['nomor_induk_pegawai'],
                                        'gaji_pokok' => $value['gaji_pokok'],
                                        'tunjangan_sia' => $value['tunjangan_sia'],
                                        'tunjangan_transportasi' => $value['tunjangan_transportasi'],
                                        'tunjangan_jabatan' => $value['tunjangan_jabatan'],
                                        'uang_jaga_utama' => $value['uang_jaga_utama'],
                                        'uang_jaga_pratama' => $value['uang_jaga_pratama'],
                                        'jasa_pelayanan_pratama' => $value['jasa_pelayanan_pratama'],
                                        'jasa_pelayanan_rawat_inap' => $value['jasa_pelayanan_rawat_inap'],
                                        'jasa_pelayanan_rawat_jalan' => $value['jasa_pelayanan_rawat_jalan'],
                                        'tugas_tambahan' => $value['tugas_tambahan'],
                                        'jumlah' => $value['jumlah'],
                                    ]);

                                    Potongan::create([
                                        'nomor_induk_pegawai' => $value['nomor_induk_pegawai'],
                                        'pph_21' => $value['pph_21'],
                                        'infaq' => $value['infaq'],
                                        'bpjs_kesehatan' => $value['bpjs_kesehatan'],
                                        'bpjs_ketenagakerjaan' => $value['bpjs_ketenagakerjaan'],
                                        'denda_absen' => $value['denda_absen'],
                                        'arisan_keluarga' => $value['arisan_keluarga'],
                                        'denda_ngaji' => $value['denda_ngaji'],
                                        'kasbon' => $value['kasbon'],
                                        'total' => $value['total_potongan'],
                                    ]);
                                }
                                return Notification::make()
                                    ->title('Berhasil')
                                    ->body('Data Penghasilan Berhasil Diimport!')
                                    ->success()
                                    ->send();
                            } else {
                                return Notification::make()
                                    ->title('Gagal!')
                                    ->body('Data bulan ini sudah diimport!')
                                    ->warning()
                                    ->send();
                            }
                        } catch (\Throwable $th) {
                            return Notification::make()
                                ->title('Gagal!')
                                ->body($th->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
                Actions\CreateAction::make()->color('success')->icon('heroicon-o-plus-circle')->label('Tambah'),
            ];
        } else {
            return [

            ];
        }

    }
}
