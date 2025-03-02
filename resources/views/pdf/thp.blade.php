<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="width: 2000px" onload="window.print();">
    <style>
        table,
        tr,
        td {
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
        <div id="thp" style="width: 900px ">
            <table style="width: 100%">
                <tr>
                    <td rowspan="3">
                        <center><img src="{{ url('1.png') }}" width="120px" height="120px" alt="">
                        </center>
                    </td>
                    <td>
                        <center>
                            KLINIK MUHAMMADIYAH KEDUNGADEM
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: end">
                        SLIP GAJI
                    </td>
                </tr>
                <tr>
                    <td style="text-align: end">
                        {{ $periode_gaji }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <b>NAMA : </b> {{ $record->nama_pegawai }}
                            </div>

                            <div id="column2" style="float:left; margin:0;width:50%;">
                                <b>JABATAN : </b>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <b>NIK : </b> {{ $record->nip }}
                            </div>

                            <div id="column2" style="float:left; margin:0;width:50%;">
                                <b>UNIT KERJA : </b>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <b>PENERIMAAN</b>
                            </div>

                            <div id="column2" style="float:left; margin:0;width:50%;">
                                <b>POTONGAN</b>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; width:50%;text-align: start;">
                                        GAJI POKOK
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp. {{ number_format($penerimaan[0]->gaji_pokok) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="column2" style="float:left; margin:0;width:50%;">
                                BIAYA - BIAYA
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        JAGA
                                    </div>
                                    <div id="column2"
                                    style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->uang_jaga_utama + $penerimaan[0]->uang_jaga_pratama) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            1. ARISAN KELUARGA
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->arisan_keluarga) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        PREMI RANAP
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->jasa_pelayanan_rawat_inap) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            2. POTONGAN INFAQ
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->infaq) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        PREMI RAJAL
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->jasa_pelayanan_rawat_jalan + $penerimaan[0]->jasa_pelayanan_pratama) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            3. KASBON
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->kasbon) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        TUGAS TAMBAHAN
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->tugas_tambahan) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            KINERJA
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        TUNJANGAN SIA
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->tunjangan_sia) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            1. DENDA TELAT
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->denda_telat) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        TUNJANGAN JABATAN
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->tunjangan_jabatan) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            2. DENDA NGAJI
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->denda_ngaji) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        TUNJANGAN TRANSPORT
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($penerimaan) > 0)
                                            Rp.
                                            {{ number_format($penerimaan[0]->tunjangan_transportasi) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            PAJAK
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            Rp. 0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        &nbsp;
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            PPH 21
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->pph_21) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        &nbsp;
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:33%;text-align: start;">
                                            ASURANSI
                                        </div>
                                        <div id="column2"
                                            style="float:left; margin:0;width:33%;text-align: end; padding-right: 10px">
                                            KLINIK
                                        </div>
                                        <div id="column2"
                                            style="float:left; margin:0;width:33%;text-align: end; padding-right: 10px">
                                            KARYAWAN
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        &nbsp;
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            1. BPJS
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->bpjs_kesehatan) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        &nbsp;
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            2. BPJS KETENAGAKERJAAN
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
                                            @if (count($potongan) > 0)
                                                Rp. {{ number_format($potongan[0]->bpjs_ketenagakerjaan) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        <b>TOTAL PENERIMAAN</b>
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
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
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                            <b>TOTAL POTONGAN</b>
                                        </div>
                                        <div id="column2"
                                            style="text-align: end; padding-right: 10px">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float:left; margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <div id="column2" style="float:left; margin:0;width:50%;text-align: start;">
                                        <b>TAKE HOME PAY</b>
                                    </div>
                                    <div id="column2"
                                        style="text-align: end; padding-right: 10px">
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
                                    </div>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <div id="column2"
                                            style="float:left; margin:0;width:100%;text-align: start;">
                                            <center>
                                                {{ $tanggal_gaji }}
                                            </center>
                                        </div>
                                        {{-- <div id="column2"
                                        style="text-align: end; padding-right: 10px">
                                        @if (count($potongan) > 0)
                                            Rp. {{ number_format($potongan[0]->bpjs_ketenagakerjaan) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <center>
                                        <div id="column2"
                                            style="float:left; margin:0;width:100%;text-align: start;">
                                            <center>
                                                Mengetahui
                                            </center>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <center>
                                            <div id="column2"
                                                style="float:left; margin:0;width:100%;text-align: start;">
                                                <center>
                                                    Diterima Oleh
                                                </center>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <center>
                                        <div id="column2"
                                            style="float:left; margin:0;width:100%;text-align: start;">
                                            <center>
                                                Bagian Keuangan
                                            </center>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <center>
                                            <div id="column2"
                                                style="float:left; margin:0;width:100%;text-align: start;">
                                                <center>
                                                    &nbsp;
                                                </center>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <center>
                                        <div id="column2"
                                            style="float:left; margin:0;width:100%;text-align: start;">
                                            <center>
                                                &nbsp;
                                            </center>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <center>
                                            <div id="column2"
                                                style="float:left; margin:0;width:100%;text-align: start;">
                                                <center>
                                                    &nbsp;
                                                </center>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div id="contentBox" style="margin:0px auto; width:100%">
                            <div id="column1" style="float margin:0; width:50%;">
                                <div id="contentBox" style="margin:0px auto; width:100%">
                                    <center>
                                        <div id="column2"
                                            style="float:left; margin:0;width:100%;text-align: start;">
                                            <center>
                                                Ayuk Saputri M,SE
                                            </center>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div id="contentBox" style="margin:0px auto; width:100%">
                                <div id="column1" style="float:left; margin:0; width:50%;">
                                    <div id="contentBox" style="margin:0px auto; width:100%">
                                        <center>
                                            <div id="column2"
                                                style="float:left; margin:0;width:100%;text-align: start;">
                                                <center>
                                                    {{ $record->nama_pegawai }}
                                                </center>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
    </center>

</body>

</html>
