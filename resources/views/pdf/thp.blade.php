<style>
    .tb_1,
    .tr_1,
    .td_1 {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        border-collapse: collapse;
    }

    @media print {
        body {
            visibility: hidden;
        }

        #thp {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<center>
    <div>
        <table class="tb_1" style="width: 100%">
            <tr class="tr_1">
                <td class="td_1" rowspan="3">
                    <center><img src="{{ url('1.png') }}" width="120px" height="120px" alt="">
                    </center>
                </td>
                <td class="td_1" >
                    <center>
                        KLINIK MUHAMMADIYAH KEDUNGADEM
                    </center>
                </td>
            </tr>
            <tr class="tr_1">
                <td class="td_1"  style="text-align: right">
                    SLIP GAJI
                </td>
            </tr>
            <tr class="tr_1">
                <td class="td_1"  style="text-align: right">
                    {{ $periode_gaji }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
            <tr>
                <td><b>NAMA : </b> {{ $record->nama_pegawai }}</td>
                <td><b>JABATAN : </b></td>
            </tr>
            </td>
            </tr>
            <tr>
                <td colspan="2">
            <tr>
                <td><b>NIK : </b> {{ $record->nip }}</td>
                <td><b>UNIT KERJA : </b></td>
            </tr>
            </td>
            </tr>
            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b>PENERIMAAN</b>
                </td>
                <td>
                    <b>POTONGAN</b>
                </td>
            </tr>
            </td>
            </tr>
            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> GAJI POKOK </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp. {{ number_format($penerimaan[0]->gaji_pokok) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    <b>BIAYA-BIAYA</b>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> JAGA </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->uang_jaga_utama + $penerimaan[0]->uang_jaga_pratama) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    1. ARISAN KELUARGA <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->arisan_keluarga) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> PREMI RANAP </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->jasa_pelayanan_rawat_inap) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    2. POTONGAN INFAQ <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->infaq) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> PREMI RAJAL </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->jasa_pelayanan_rawat_jalan + $penerimaan[0]->jasa_pelayanan_pratama) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    3. KASBON <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->kasbon) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b>TUGAS TAMBAHAN </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->tugas_tambahan) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td><b>
                    KINERJA</b>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> TUNJANGAN SIA </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->tunjangan_sia) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    1. DENDA TELAT <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->denda_telat) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> TUNJANGAN JABATAN </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->tunjangan_jabatan) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    2. DENDA NGAJI <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->denda_ngaji) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> TUNJANGAN TRANSPORT </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format($penerimaan[0]->tunjangan_transportasi) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    <b>PAJAK</b> <span>
                        Rp.0
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> &nbsp; </b> <span>
                        &nbsp;
                    </span>
                </td>
                <td>
                    <b>PPH 21</b> <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->pph_21) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> &nbsp; </b> <span>
                        &nbsp;
                    </span>
                </td>
                <td>
                    1. BPJS <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->bpjs_kesehatan) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> &nbsp; </b> <span>
                        &nbsp;
                    </span>
                </td>
                <td>
                    2. BPJS KETENAGAKERJAAN <span>
                        @if (count($potongan) > 0)
                            Rp. {{ number_format($potongan[0]->bpjs_ketenagakerjaan) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> TOTAL PENERIMAAN </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format(
                                $penerimaan[0]->gaji_pokok +
                                    $penerimaan[0]->tunjangan_sia +
                                    $penerimaan[0]->tunjangan_transportasi +
                                    $penerimaan[0]->tunjangan_jabatan +
                                    $penerimaan[0]->uang_jaga_utama +
                                    $penerimaan[0]->uang_jaga_pratama +
                                    $penerimaan[0]->jasa_pelayanan_pratama +
                                    $penerimaan[0]->jasa_pelayanan_rawat_inap +
                                    $penerimaan[0]->jasa_pelayanan_rawat_jalan +
                                    $penerimaan[0]->tugas_tambahan,
                            ) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    <b>TOTAL POTONGAN</b> <span>
                        @if (count($potongan) > 0)
                            Rp.
                            {{ number_format(
                                $potongan[0]->pph_21 +
                                    $potongan[0]->infaq +
                                    $potongan[0]->bpjs_kesehatan +
                                    $potongan[0]->bpjs_ketenagakerjaan +
                                    $potongan[0]->denda_absen +
                                    $potongan[0]->arisan_keluarga +
                                    $potongan[0]->denda_ngaji +
                                    $potongan[0]->kasbon,
                            ) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <b> TAKE HOME PAY </b> <span>
                        @if (count($penerimaan) > 0)
                            Rp.
                            {{ number_format(
                                $penerimaan[0]->gaji_pokok +
                                    $penerimaan[0]->tunjangan_sia +
                                    $penerimaan[0]->tunjangan_transportasi +
                                    $penerimaan[0]->tunjangan_jabatan +
                                    $penerimaan[0]->uang_jaga_utama +
                                    $penerimaan[0]->uang_jaga_pratama +
                                    $penerimaan[0]->jasa_pelayanan_pratama +
                                    $penerimaan[0]->jasa_pelayanan_rawat_inap +
                                    $penerimaan[0]->jasa_pelayanan_rawat_jalan +
                                    $penerimaan[0]->tugas_tambahan -
                                    ($potongan[0]->pph_21 +
                                        $potongan[0]->infaq +
                                        $potongan[0]->bpjs_kesehatan +
                                        $potongan[0]->bpjs_ketenagakerjaan +
                                        $potongan[0]->denda_absen +
                                        $potongan[0]->arisan_keluarga +
                                        $potongan[0]->denda_ngaji +
                                        $potongan[0]->kasbon),
                            ) }}
                        @else
                            Rp. 0
                        @endif
                    </span>
                </td>
                <td>
                    <center>
                        {{ $tanggal_gaji }}
                    </center>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <center>Mengetahui</center>
                </td>
                <td>
                    <center>Diterima Oleh</center>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <center>Bagian Keuangan</center>
                </td>
                <td>
                    <center></center>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <center>&nbsp;</center>
                </td>
                <td>
                    <center>&nbsp;</center>
                </td>
            </tr>
            </td>
            </tr>

            <tr>
                <td colspan="2">
            <tr>
                <td>
                    <center>Ayuk Saputri M,SE</center>
                </td>
                <td>
                    <center>{{ $record->nama_pegawai }}</center>
                </td>
            </tr>
            </td>
            </tr>

        </table>
    </div>
</center>
