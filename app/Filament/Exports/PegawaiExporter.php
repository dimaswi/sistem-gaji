<?php

namespace App\Filament\Exports;

use App\Models\Pegawai;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PegawaiExporter extends Exporter
{
    protected static ?string $model = Pegawai::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nama_pegawai')->label('Nama Pegawai'),
            ExportColumn::make('nip')->label('Nomor Induk Pegawai'),
            ExportColumn::make('nomor_whatsapp')->label('Nomor Whatsapp'),
            ExportColumn::make('gaji_pokok')->label('Gaji Pokok'),
            ExportColumn::make('tunjangan_sia')->label('Tunjangan SIA'),
            ExportColumn::make('tunjangan_transportasi')->label('Tunjangan Transportasi'),
            ExportColumn::make('tunjangan_jabatan')->label('Tunjangan Jabatan'),
            ExportColumn::make('uang_jaga_utama')->label('Uang Jaga Utama'),
            ExportColumn::make('uang_jaga_pratama')->label('Uang Jaga Pratama'),
            ExportColumn::make('jaspel_pratama')->label('Jasa Pelayanan Pratama'),
            ExportColumn::make('jaspel_ranap')->label('Jasa Pelayanan Rawat Inap'),
            ExportColumn::make('jaspel_irja')->label('Jasa Pelayanan Rawat Jalan'),
            ExportColumn::make('tugas_tambahan')->label('Tugas Tambahan'),
            ExportColumn::make('jumlah')->label('Jumlah'),
            ExportColumn::make('pph21')->label('PPh 21'),
            ExportColumn::make('infaq')->label('Infaq'),
            ExportColumn::make('bpjs_kes')->label('BPJS Kesehatan'),
            ExportColumn::make('bpjs_tk')->label('BPJS Ketenagakerjaan'),
            ExportColumn::make('denda_absen')->label('Denda Absen'),
            ExportColumn::make('arisan_keluarga')->label('Arisan Keluarga'),
            ExportColumn::make('denda_ngaji')->label('Denda Ngaji'),
            ExportColumn::make('kasbon')->label('Kasbon'),
            ExportColumn::make('total')->label('total_potongan'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Berhasil Export Pegawai ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
