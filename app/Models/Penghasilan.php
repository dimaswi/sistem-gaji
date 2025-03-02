<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    use HasFactory;

    protected $table = 'penghasilan';

    protected $fillable = [
        'nomor_induk_pegawai',
        'gaji_pokok',
        'tunjangan_sia',
        'tunjangan_transportasi',
        'tunjangan_jabatan',
        'uang_jaga_utama',
        'uang_jaga_pratama',
        'jasa_pelayanan_pratama',
        'jasa_pelayanan_rawat_inap',
        'jasa_pelayanan_rawat_jalan',
        'tugas_tambahan',
        'jumlah',
    ];
}
