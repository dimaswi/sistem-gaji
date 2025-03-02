<?php

namespace App\Filament\Gaji\Resources\PegawaiResource\Pages;

use App\Filament\Gaji\Resources\PegawaiResource;
use App\Models\Pegawai;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class InputTHP extends Page
{
    protected static string $resource = PegawaiResource::class;

    protected static string $view = 'filament.gaji.resources.pegawai-resource.pages.input-t-h-p';

    use InteractsWithRecord;

    public function mount($record)
    {
        $this->record = $this->resolveRecord($record);
    }

    protected static ?string $title = 'Masukan Take Home Pay';
}
