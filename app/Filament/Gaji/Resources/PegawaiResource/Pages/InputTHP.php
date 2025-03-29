<?php

namespace App\Filament\Gaji\Resources\PegawaiResource\Pages;

use App\Filament\Gaji\Resources\PegawaiResource;
use App\Models\Pegawai;
use App\Models\Penghasilan;
use App\Models\Potongan;
use Carbon\Carbon;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class InputTHP extends Page
{
    protected static string $resource = PegawaiResource::class;

    protected static string $view = 'filament.gaji.resources.pegawai-resource.pages.input-t-h-p';

    use InteractsWithRecord;

    public $penerimaan;

    public $potongan;

    public $periode;

    public $periode_gaji;

    public $tanggal_gaji;

    public function mount($record)
    {
        $this->periode = Carbon::now('Asia/Jakarta')->format('m');
        setlocale(LC_ALL, 'IND');
        $tanggal = $this->periode . '/03/' . Carbon::now('Asia/Jakarta')->format('Y');
        $this->periode_gaji = Carbon::parse($tanggal)->subMonth()->formatLocalized('%B %Y');
        $this->tanggal_gaji = Carbon::parse($tanggal)->subMonth()->formatLocalized('%A %d %B %Y');
        $this->record = $this->resolveRecord($record);
        $this->penerimaan = Penghasilan::where('nomor_induk_pegawai', $this->record->nip)->whereMonth('created_at', $this->periode)->get();
        $this->potongan = Potongan::where('nomor_induk_pegawai', $this->record->nip)->whereMonth('created_at', $this->periode)->get();
    }

    public function cariPeriode()
    {
        $this->penerimaan = Penghasilan::where('nomor_induk_pegawai', $this->record->nip)->whereMonth('created_at', $this->periode)->get();
        $this->potongan = Potongan::where('nomor_induk_pegawai', $this->record->nip)->whereMonth('created_at', $this->periode)->get();
        $tanggal = $this->periode . '/03/' . Carbon::now('Asia/Jakarta')->format('Y');
        setlocale(LC_ALL, 'IND');
        $this->periode_gaji = Carbon::parse($tanggal)->formatLocalized('%B %Y');
        $this->tanggal_gaji = Carbon::parse($tanggal)->addMonth()->formatLocalized('%A %d %B %Y');
        // dd($this->tanggal_gaji);
    }

    protected static ?string $title = 'Take Home Pay';
}
