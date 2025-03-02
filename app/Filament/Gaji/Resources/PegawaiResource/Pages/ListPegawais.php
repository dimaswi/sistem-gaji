<?php

namespace App\Filament\Gaji\Resources\PegawaiResource\Pages;

use App\Filament\Gaji\Resources\PegawaiResource;
use App\Models\Penghasilan;
use App\Models\Potongan;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Collection;

class ListPegawais extends ListRecords
{
    protected static string $resource = PegawaiResource::class;

    protected static ?string $title = 'Pegawai';

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->color("warning")
                ->processCollectionUsing(function (string $modelClass, Collection $collection) {
                    try {

                        foreach ($collection as $key => $value) {
                            Penghasilan::created([
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
    }
}
