<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $table = 'potongan';

    protected $fillable = [
        'nomor_induk_pegawai',
        'pph_21',
        'infaq',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'denda_absen',
        'arisan_keluarga',
        'denda_ngaji',
        'kasbon',
        'total',
    ];
}
