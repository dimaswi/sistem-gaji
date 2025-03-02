<?php

use App\Models\Pegawai;
use App\Models\Penghasilan;
use App\Models\Potongan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{id}', function () {
    $record = Pegawai::where('id', request()->id)->first();
    $periode = Carbon::now('Asia/Jakarta')->format('m');
    setlocale(LC_ALL, 'IND');
    $tanggal = $periode . '/03/' . Carbon::now('Asia/Jakarta')->format('Y');
    $periode_gaji = Carbon::parse($tanggal)->subMonth()->formatLocalized('%B %Y');
    $tanggal_gaji = Carbon::parse($tanggal)->subMonth()->formatLocalized('%A %d %B %Y');
    $penerimaan = Penghasilan::where('nomor_induk_pegawai', $record->nip)->whereMonth('created_at', $periode)->get();
    $potongan = Potongan::where('nomor_induk_pegawai', $record->nip)->whereMonth('created_at', $periode)->get();
    return view('pdf.thp', compact(
        'periode',
        'periode_gaji',
        'tanggal_gaji',
        'penerimaan',
        'potongan',
        'record'
    ));
});
