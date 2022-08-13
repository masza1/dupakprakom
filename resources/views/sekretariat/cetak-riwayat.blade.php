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

        .text-uppercase {
            text-transform: uppercase !important;
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
                    </td>
                </tr>
            </tbody>
        </table>
    </header>

    <main>
        <table class="border w-100">
            <thead>
                <tr>
                    <th class="text-center text-uppercase" style="width: 5%">Nomor</th>
                    <th class="text-center text-uppercase" style="width: 10%">Nama Pegawai</th>
                    <th class="text-center text-uppercase" style="width: 10%">Semester</th>
                    <th class="text-center text-uppercase" style="width: 10%">Masa Pengajuan</th>
                    <th class="text-center text-uppercase" style="width: 10%">Status</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($submissions as $item)
                  <tr>
                    <td class="text-center align-middle">{{ $item->number }}</td>
                    <td class="text-center align-middle">{{ $item->employee->name }}</td>
                    <td class="text-center align-middle">{{ $item->semester }}</td>
                    <td class="text-center align-middle">{{ $item->start_date . ' - ' . $item->end_date }}</td>
                    <td class="text-center align-middle">{{ $item->status }}</td>
                  </tr>
              @endforeach
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
