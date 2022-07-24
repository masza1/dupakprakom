<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Penilaian</title>
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <style>
        body {
            font-family: ctimes;
            /* background: rgb(103, 100, 100); */
        }

        .text-center {
            text-align: center !important;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .text-start {
            text-align: left !important
        }

        .fs-20 {
            font-size: 23px;
        }

        .fs-18 {
            font-size: 21px;
        }

        .fs-16 {
            font-size: 18px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .fs-12 {
            font-size: 12px;
        }

        .fs-10 {
            font-size: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .text-end {
            text-align: right !important
        }

        .d-flex {
            display: flex !important
        }

        .justify-content-start {
            justify-content: flex-start !important
        }

        .justify-content-end {
            justify-content: flex-end !important
        }

        .justify-content-center {
            justify-content: center !important
        }

        .justify-content-between {
            justify-content: space-between !important
        }

        .justify-content-around {
            justify-content: space-around !important
        }

        .justify-content-evenly {
            justify-content: space-evenly !important
        }

        .w-100 {
            width: 100% !important
        }


        table.border,
        table.border tr,
        table.border td,
        table.border th {
            border: 1px solid black;
            border-collapse: collapse !important;
            padding: 5px 4px;
        }

        table.no-border,
        table.no-border tr,
        table.no-border td,
        table.no-border th {
            padding: 5px 4px;
        }
    </style>
    <style>
        /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            /* margin: 0cm 0cm; */
            margin-top: 1cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 0cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

        }

        main {
            position: fixed;
            top: 3.7cm;
            left: 0cm;
            right: 0cm;

        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>

<body>
    <header>
        <table class="w-100">
            <tbody>
                <tr>
                    <td class="text-center">
                        <img src="{{ asset('assets/img/kop_header.jpg.png') }}" alt="Kop Header" width="150px">
                    </td>
                    <td class="text-center" style="padding-top: 0px; padding-bottom: 0px">
                        <span style="font-size: 23px"><b>PEMERINTAH KABUPATEN TANGERANG <br></b></span>
                        <span style="font-size: 21px"><b>PENETAPAN ANGKA KREDIT <br></b></span>
                        <span style="font-size: 18px"><b>JABATAN FUNGSIONAL PRANATA KOMPUTER <br></b></span>
                        <span style="font-size: 18px">Nomor : <b>{{ $newSubmission->number }}</b></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </header>

    <main>
        <div class="w-100">
            <div style="float: left">
                <span class="fs-14 bold">Unit Kerja : {{ $employee->unit->unit_name }}</span>
            </div>
            <div style="float: right">
                <span class="fs-14"><span class="bold">Masa Penilaian : </span>{{ date('d-m-Y', strtotime($newSubmission->start_date)) }} s/d {{ date('d-m-Y', strtotime($newSubmission->end_date)) }}</span>
            </div>
        </div>

        <table class="border w-100" style="margin-top: 24px">
            <thead>
                <tr>
                    <th class="align-middle text-center" style="width: 8%">I</th>
                    <th colspan="6" class="align-middle text-center">KETERANGAN PERORANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="11"></td>
                    <td class="align-middle" style="width: 5%;">1.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Nama</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->name }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">2.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">NIP</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->nip }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">3.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Pangkat/Golongan ruang, TMT</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->group->rank . '/' . $employee->group->group_name }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">4.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Tempat dan Tanggal Lahir</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->birthplace . ', ' . date('d F Y', strtotime($employee->birthdate)) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">5.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Jenis Kelamin</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->gender == 'L' ? 'Pria' : 'Wanita' }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">6.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Pendidikan Terkhir</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->jenjang_pendidikan . '/' . $employee->institusi }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">7.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Pendidikan yang diusulkan angka credit</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: </p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">8.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Jabatan Fungsional, TMT</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->position->position_name . ', ' . $employee->tmt }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">9.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Masa Kerja Golongan Lama</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->tahun_lama . ' Tahun' . $employee->bulan_lama . ' Bulan' }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;"></td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Masa Kerja Golongan Baru</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->tahun_baru . ' Tahun' . $employee->bulan_baru . ' Bulan' }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle" style="width: 5%;">10.</td>
                    <td colspan="5" class="align-middle fs-14" style="width: 100%;">
                        <p style="width: 43%; display: inline-block; margin: 0px">Unit Kerja</p>
                        <p style="width: 50%; display: inline-block;margin: 0px">: {{ $employee->unit->unit_name }}</p>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle text-center" style="width: 8%">II</th>
                    <th colspan="6" class="align-middle text-center">PENETAPAN ANGKA KREDIT</th>
                </tr>
                <tr>
                    <td rowspan="9"></td>
                    <th class="align-middle text-center fs-14" style="width: 5%;">NO</th>
                    <th colspan="2" class="align-middle text-center fs-14" style="width: 5%;">URAIAN</th>
                    <th class="align-middle text-center fs-14" style="width: 5%;">LAMA</th>
                    <th class="align-middle text-center fs-14" style="width: 5%;">BARU</th>
                    <th class="align-middle text-center fs-14" style="width: 5%;">JUMLAH</th>
                </tr>
                <tr>
                    <td rowspan="5" class="text-center fs-14" style="width: 5%;vertical-align: top">I</td>
                    <td colspan="2" class="align-middle fs-14" style="padding: 5px 4px">Tugas Jabatan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="align-middle text-center fs-14" style="width:4%;">1.</td>
                    <td class="align-middle fs-14" style="padding: 5px 4px">Tata Kelola dan Tata Laksana Teknologi Informasi</td>
                    @php
                        $total_tata_kelola = 0;
                        $total_infrastruktur = 0;
                        $total_sistem = 0;
                        $total_pengembangan = 0;
                        $total_penunjang = 0;
                        $mustBreak = false;
                        $total_lama = 0;
                        $total_baru = 0;
                        $total_jumlah = 0;
                    @endphp
                    @if ($oldSubmission != null)
                        @forelse ($oldSubmission->detail_activities as $item)
                            @if ($item->element_id == 1)
                                @php
                                    $total_tata_kelola += $item->grand_total_credit;
                                    $total_lama += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    @if ($newSubmission != null)
                        @forelse ($newSubmission->detail_activities as $item)
                            @if ($item->element_id == 1)
                                @php
                                    $total_tata_kelola += $item->grand_total_credit;
                                    $total_baru += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    <td class="align-middle text-center fs-14">{{ $total_tata_kelola }}</td>
                </tr>
                <tr>
                    <td class="align-middle text-center fs-14 fs-14" style="width:4%;">2.</td>
                    <td class="align-middle fs-14" style="padding: 5px 4px">Infrastruktur Teknologi Informasi</td>
                    @if ($oldSubmission != null)
                        @forelse ($oldSubmission->detail_activities as $item)
                            @if ($item->element_id == 2)
                                @php
                                    $total_infrastruktur += $item->grand_total_credit;
                                    $total_lama += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    @if ($newSubmission != null)
                        @forelse ($newSubmission->detail_activities as $item)
                            @if ($item->element_id == 2)
                                @php
                                    $total_infrastruktur += $item->grand_total_credit;
                                    $total_baru += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    <td class="align-middle text-center fs-14">{{ $total_infrastruktur }}</td>
                </tr>
                <tr>
                    <td class="align-middle text-center fs-14 fs-14" style="width:4%;">3.</td>
                    <td class="align-middle fs-14" style="padding: 5px 4px">Sistem Informasi dan Multimedia</td>
                    @if ($oldSubmission != null)
                        @forelse ($oldSubmission->detail_activities as $item)
                            @if ($item->element_id == 3)
                                @php
                                    $total_sistem += $item->grand_total_credit;
                                    $total_lama += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    @if ($newSubmission != null)
                        @forelse ($newSubmission->detail_activities as $item)
                            @if ($item->element_id == 3)
                                @php
                                    $total_sistem += $item->grand_total_credit;
                                    $total_baru += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    <td class="align-middle text-center fs-14">{{ $total_sistem }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="align-middle text-center fs-14"><b>Jumlah Tugas Jabatan</b></td>
                    <td class="align-middle text-center fs-14">{{ $total_lama }}</td>
                    <td class="align-middle text-center fs-14">{{ $total_baru }}</td>
                    <td class="align-middle text-center fs-14">{{ $total_jumlah }}</td>
                </tr>
                <tr>
                    <td class="text-center fs-14" style="width: 5%;vertical-align: top">II</td>
                    <td colspan="2" class="align-middle fs-14" style="padding: 5px 4px">Pengembangan Profesi</td>
                    @if ($oldSubmission != null)
                        @forelse ($oldSubmission->detail_activities as $item)
                            @if ($item->element_id == 4)
                                @php
                                    $total_pengembangan += $item->grand_total_credit;
                                    $total_lama += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    @if ($newSubmission != null)
                        @forelse ($newSubmission->detail_activities as $item)
                            @if ($item->element_id == 4)
                                @php
                                    $total_pengembangan += $item->grand_total_credit;
                                    $total_baru += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    <td class="align-middle text-center fs-14">{{ $total_pengembangan }}</td>
                </tr>
                <tr>
                    <td class="text-center fs-14" style="width: 5%;vertical-align: top">III</td>
                    <td colspan="2" class="align-middle fs-14" style="padding: 5px 4px">Penunjang Tugas Pejabat Pranata Komputer</td>
                    @if ($oldSubmission != null)
                        @forelse ($oldSubmission->detail_activities as $item)
                            @if ($item->element_id == 5)
                                @php
                                    $total_penunjang += $item->grand_total_credit;
                                    $total_lama += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    @if ($newSubmission != null)
                        @forelse ($newSubmission->detail_activities as $item)
                            @if ($item->element_id == 5)
                                @php
                                    $total_penunjang += $item->grand_total_credit;
                                    $total_baru += $item->grand_total_credit;
                                    $total_jumlah += $item->grand_total_credit;
                                    $mustBreak = true;
                                @endphp
                                <td class="align-middle text-center fs-14">{{ $item->grand_total_credit }}</td>
                            @else
                                @php
                                    $mustBreak = false;
                                @endphp
                            @endif
                        @empty
                            @php
                                $mustBreak = false;
                            @endphp
                        @endforelse
                        @if ($mustBreak)
                            @php
                                $mustBreak = false;
                            @endphp
                        @else
                            <td class="align-middle text-center fs-14">-</td>
                        @endif
                    @else
                        <td class="align-middle text-center fs-14">-</td>
                    @endif
                    <td class="align-middle text-center fs-14">{{ $total_penunjang }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="align-middle text-center fs-14"><b>JUMLAH (I + II + III)</b></td>
                    <td class="align-middle text-center fs-14">{{ $total_lama }}</td>
                    <td class="align-middle text-center fs-14">{{ $total_baru }}</td>
                    <td class="align-middle text-center fs-14">{{ $total_jumlah }}</td>
                </tr>
                <tr>
                    <th class="align-middle text-center" style="width: 8%">III</th>
                    <th colspan="6" class="align-middle text-center"></th>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 25px; width: 100%">
            <tbody>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px">Ditetapkan di</td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px">: S I D O A R J O</td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px">Pada tanggal</td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px">: </td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%">a.n</td>
                    <td colspan="2" class="align-middle fs-14" style="width: 10%; padding: 0px">BUPATI SIDOARJO</td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td colspan="2" class="align-middle fs-14" style="width: 10%; padding: 0px">Pj. SEKRETARIS DAERAH,</td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td class="align-middle fs-14" style="width: 10%; padding: 0px"></td>
                    <td class="align-middle fs-14" style="width: 20%; padding: 0px"></td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td colspan="2" class="align-middle fs-14" style="width: 10%; padding: 0px; font-weight: bold;text-decoration: underline">{{ $tanda->name }}</td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td colspan="2" class="align-middle fs-14" style="width: 10%; padding: 0px">{{ $tanda->jabatan }}</td>
                </tr>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width: 3%"></td>
                    <td colspan="2" class="align-middle fs-14" style="width: 10%; padding: 0px">NIP. {{ $tanda->nip }}</td>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 25px; width:100%">
            <tbody>
                <tr>
                    <td class="fs-14" style="width: 10%; font-weight: bold;text-decoration: underline">TEMBUSAN</td>
                    <td class="fs-14">disampaikan dengan hormat kepada : </td>
                </tr>
                <tr>
                    <td colspan="2" class="fs-14">1. Kepala Kantor Regional II BKN Surabaya; <br>
                        2. Sekretaris Tim Penilai yang bersangkutan; <br>
                        3. Pranata Komputer yang bersangkutan;
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer>
        <table class="w-100">
            <tbody>
                <tr>
                    <td rowspan="3" class="text-center">
                        <img src="{{ asset('assets/img/kop_footer.jpg') }}" alt="Kop Header" width="100px">
                    </td>
                    <td rowspan="3" class="text-center fs-10">
                        Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh BsrE sesuai dengan <br>
                        Undang Undang No 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik, tanda tangan secara elektronik memiliki kekuatan <br>
                        hukum dan akibat hukum yang sah
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>

</html>
