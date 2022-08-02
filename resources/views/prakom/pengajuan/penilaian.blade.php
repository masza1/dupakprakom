@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
    <style>
        .dropify-wrapper .dropify-message span.file-icon {
            font-size: 26px !important;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
@endpush
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <button class="card-header btn btn-secondary d-flex justify-content-start" data-coreui-toggle="collapse" data-coreui-target="#dataPengajuan" aria-expanded="true" aria-controls="dataPengajuan">
                        Data Pengajuan
                    </button>
                    <div class="card-body collapse show" id="dataPengajuan">
                        <form action="{{ route('penilai.nilai-pengajuan', ['id' => $submission->id, 'type' => 'pengajuan']) }}" enctype="multipart/form-data" method="post" id="formPengajuan">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $submission->id ?? '' }}">
                                <input type="hidden" name="status" value="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number">Nomor</label>
                                        <input class="form-control" type="text" id="number" value="{{ $submission->number }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submission_date">Tanggal Pengajuan</label>
                                        <input class="form-control" type="date" id="submission_date" value="{{ $submission->submission_date }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Masa Penilaian Awal</label>
                                        <input class="form-control" type="date" id="start_date" value="{{ $submission->start_date }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Masa Penilaian Akhir</label>
                                        <input class="form-control" type="date" id="end_date" value="{{ $submission->end_date }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="sp_valid" id="sp_valid" class="form-check-input" {{ $submission->sp_valid ? 'checked' : '' }}>
                                        <label for="sp_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->surat_pengantar }}">Lihat File Surat Pengantar</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="matriks_valid" id="matriks_valid" class="form-check-input" {{ $submission->matriks_valid ? 'checked' : '' }}>
                                        <label for="matriks_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->matriks_pengajuan }}">Lihat File Matriks Pengajuanr</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="pangkat_valid" id="pangkat_valid" class="form-check-input" {{ $submission->pangkat_valid ? 'checked' : '' }}>
                                        <label for="pangkat_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->sk_pangkat }}">Lihat File SK Pangkat</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="kenaikan_valid" id="kenaikan_valid" class="form-check-input" {{ $submission->kenaikan_valid ? 'checked' : '' }}>
                                        <label for="kenaikan_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->sk_kenaikan }}">Lihat File SK Kenaikan</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="pak_valid" id="pak_valid" class="form-check-input" {{ $submission->pak_valid ? 'checked' : '' }}>
                                        <label for="pak_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->pak_terakhir }}">Lihat File PAK</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="skp1_valid" id="skp1_valid" class="form-check-input" {{ $submission->skp1_valid ? 'checked' : '' }}>
                                        <label for="skp1_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->skp1 }}">Lihat File SKP 1 Tahun Terakhir</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="skp2_valid" id="skp2_valid" class="form-check-input" {{ $submission->skp2_valid ? 'checked' : '' }}>
                                        <label for="skp2_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->skp2 }}">Lihat File SKP 2 Tahun Terakhir</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="ijazah_valid" id="ijazah_valid" class="form-check-input" {{ $submission->ijazah_valid ? 'checked' : '' }}>
                                        <label for="ijazah_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->ijazah }}">Lihat File Ijazah</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check d-flex align-items-center gap-2">
                                        <input type="checkbox" name="spmk_valid" id="spmk_valid" class="form-check-input" {{ $submission->spmk_valid ? 'checked' : '' }}>
                                        <label for="spmk_valid" class="form-check-label">Valid ?
                                        </label>
                                        <button type="button" class="btn btn-link view-file ps-0" data-src="{{ $submission->spmk }}">Lihat File SPMK</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" style="resize: none; height:100px" id="catatan_penilai" name="catatan_penilai" placeholder="catatan_penilai">{{ $submission->catatan_penilai }}</textarea>
                                        <label for="catatan_penilai">Catatan Penilai</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="btn btn-primary text-white w-100" type="submit" data-type="PENGAJUAN" id="btnDraft">Simpan</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success text-white w-100" type="submit" data-type="TELAH DINILAI" id="btnAccept">Selesai</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-warning text-white w-100" type="submit" data-type="REVISI" id="btnRevisi">Revisi</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger text-white w-100" type="submit" data-type="TOLAK" id="btnReject">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <button class="card-header btn btn-secondary d-flex justify-content-start" data-coreui-toggle="collapse" data-coreui-target="#detailActivity" aria-expanded="true" aria-controls="detailActivity">
                        Detail Kegiatan Tugas
                    </button>
                    <div class="card-body collapse show" id="detailActivity">
                        <table class="table table-striped border datatable w-100" id="datatableDetailActivity">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">Tahun</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Semester</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Uraian Kegiatan</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Output</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Jumlah</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Angka Kredit</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Kredit Disetujui</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-4">
                    <button class="card-header btn btn-secondary d-flex justify-content-start" data-coreui-toggle="collapse" data-coreui-target="#detailActivityPen" aria-expanded="true" aria-controls="detailActivityPen">
                        Detail Kegiatan Penunjang
                    </button>
                    <div class="card-body collapse show" id="detailActivityPen">
                        <table class="table table-striped border datatable w-100" id="datatableDetailActivityPen">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">Tahun</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Semester</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Uraian Kegiatan</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Output</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Jumlah</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Angka Kredit</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Kredit Disetujui</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
@push('offcanvas')
    <x-base-offcanvas id="canvasAddKegiatan" canvasTitle="Nilai Kegiatan" formId="formAddKegiatan" withForm="true">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="year" name="year" class="form-control" disabled>
                        <option value="" selected disabled>-- Pilih Tahun --</option>
                        @for ($i = 2018; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="semester" name="semester" class="form-control" disabled>
                        <option value="" selected disabled>-- Pilih Semester --</option>
                        <option value="SEMESTER I">SEMESTER I</option>
                        <option value="SEMESTER II">SEMESTER II</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="match_position" name="match_position" class="form-control" disabled>
                        <option value="" selected disabled>-- Pilih Kesesuaian Jenjang Jabatan --</option>
                        <option value="SESUAI">Sesuai jenjang</option>
                        <option value="DIATAS">Satu Jenjang diatasnya</option>
                        <option value="DIBAWAH">Satu Jenjang dibawahnya</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="element_id" name="element_id" class="form-control" disabled>
                        <option value="" selected>-- Pilih Unsur --</option>
                        @foreach ($elements as $item)
                            <option value="{{ $item->id }}" data-type="{{ $item->type }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="sub_element_id" name="sub_element_id" class="form-control" disabled>
                        <option value="" selected disabled>-- Pilih Sub Unsur --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <select id="activity_id" name="activity_id" class="form-control select2" disabled>
                        <option value="" selected disabled>-- Pilih Kegiatan --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="output" type="text" placeholder="Nama Kegiatan" disabled>
                    <label for="output">Output</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input class="form-control" id="credit" type="number" step="any" placeholder="Nama Kegiatan" disabled>
                    <label for="credit">Credit</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input class="form-control" id="jumlah" type="number" step="1" name="jumlah" placeholder="Tempat Lahir" disabled>
                    <label for="jumlah">Jumlah</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input class="form-control" id="total_credit" type="number" name="total_credit" step="any" placeholder="Tempat Lahir" disabled>
                    <label for="total_credit">Total Kredit</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check d-flex align-items-center gap-2">
                    <input type="checkbox" name="spt_valid" id="spt_valid" class="form-check-input">
                    <label for="spt_valid" class="form-check-label">Valid ?
                    </label>
                    <button type="button" class="btn btn-link view-file ps-0" id="file_spt">Lihat File SPT</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check d-flex align-items-center gap-2">
                    <input type="checkbox" name="bukti1_valid" id="bukti1_valid" class="form-check-input">
                    <label for="bukti1_valid" class="form-check-label">Valid ?
                    </label>
                    <button type="button" class="btn btn-link view-file ps-0" id="file_bukti1">Lihat File Bukti 1</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check d-flex align-items-center gap-2">
                    <input type="checkbox" name="bukti2_valid" id="bukti2_valid" class="form-check-input">
                    <label for="bukti2_valid" class="form-check-label">Valid ?
                    </label>
                    <button type="button" class="btn btn-link view-file ps-0" id="file_bukti2">Lihat File Bukti 2</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check d-flex align-items-center gap-2">
                    <input type="checkbox" name="bukti3_valid" id="bukti3_valid" class="form-check-input">
                    <label for="bukti3_valid" class="form-check-label">Valid ?
                    </label>
                    <button type="button" class="btn btn-link view-file ps-0" id="file_bukti3">Lihat File Bukti 3</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="approve_credit" type="number" name="approve_credit" step="any" placeholder="Tempat Lahir">
                    <label for="approve_credit">Nilai yang disetujui</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <textarea class="form-control" style="resize: none; height:100px" id="description" name="description" placeholder="description"></textarea>
                    <label for="description">Catatan Penilai</label>
                </div>
            </div>
        </div>
    </x-base-offcanvas>
@endpush
@push('modal')
    <x-base-modal id="modalFile" :modalWidth="__('lg')">
        <embed src="" type="application/pdf" width="100%" style="height: 75vh">
    </x-base-modal>
@endpush
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.form-check a').on('click', function(e) {
                e.preventDefault();
                $('#modalFile').modal('show')
                $('#modalFile iframe').attr('src', $(this).attr('href'))
            })

            var user_level = '{{ auth()->user()->level }}'
            if (user_level == 'prakom' || user_level == 'admin') {
                $(document).find('#canvasAddKegiatan button[type="submit"]').remove()
                $(document).find('.body form button[type="submit"]').remove()
                $(document).find('.body form').removeAttr('action')
                $(document).find('.body form').removeAttr('method')
                $(document).find('#canvasAddKegiatan form').removeAttr('action')
                $(document).find('#canvasAddKegiatan form').removeAttr('method')
                $(document).find('#canvasAddKegiatan input').prop('disabled', true)
                $(document).find('#canvasAddKegiatan textarea').prop('disabled', true)
                $(document).find('.body input').prop('disabled', true)
                $(document).find('.body textarea').prop('disabled', true)
            }

            var initial = {};
            var kegiatanUrl = '{{ route('prakom.detail-kegitan.index', ['submission' => ' ']) }}';
            var kegiatanPenUrl = '{{ route('prakom.detail-kegitan-pen.index', ['submission' => ' ']) }}';
            kegiatanUrl = kegiatanUrl.replace('%20', '{{ $submission->id }}')
            kegiatanPenUrl = kegiatanPenUrl.replace('%20', '{{ $submission->id }}')
            var datatableDetail, datatableDetailPen, grand_total_approve = 0;
            var customRowDetail =
                '<tr>' +
                '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Angka Kredit Kegiatan Tugas</td>' +
                '<td class="align-middle fw-bold grand_total">-</td>' +
                '<td class="align-middle fw-bold"></td>' +
                '<td></td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Kredit Disetujui Kegiatan Tugas</td>' +
                '<td class="align-middle fw-bold"></td>' +
                '<td class="align-middle fw-bold grand_approve">-</td>' +
                '<td></td>' +
                '</tr>'

            var customRowDetailPen =
                '<tr>' +
                '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Angka Kredit Kegiatan Penunjang</td>' +
                '<td class="align-middle fw-bold grand_total">-</td>' +
                '<td class="align-middle fw-bold"></td>' +
                '<td></td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Kredit Disetujui Kegiatan Penunjang</td>' +
                '<td class="align-middle fw-bold"></td>' +
                '<td class="align-middle fw-bold grand_approve">-</td>' +
                '<td></td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="5" class="text-left align-middle fw-bold">Grand Total Kredit Disetujui</td>' +
                '<td class="align-middle fw-bold"></td>' +
                '<td class="align-middle fw-bold grand_total_approve"></td>' +
                '<td></td>' +
                '</tr>'


            function initialDatatable(table, url, dataTableData, addRow) {
                let datatable = table.DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6 mb-2'B>>" +
                        "<'row justify-content-between'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4 d-flex justify-content-end'f>>" +
                        "<'row'<'col-sm-12'rtr>>" +
                        "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 d-flex justify-content-end'p>>",
                    language: {
                        search: '',
                        searchPlaceholder: "Cari...",
                        processing: '<div class="d-flex justify-content-center"><img id="loading" src="{{ asset('assets/img/Spinner-1s-200px.svg') }}" alt="*" style="width: 90px;position:absolute; top:10px; transform: translate(-50%, -50%);"></div>',
                        lengthMenu: '_MENU_ Baris',
                        emptyTable: 'Tidak ada data yang tersedia pada tabel ini',
                        zeroRecords: 'Tidak ditemukan data yang sesuai',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                        infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data',
                        infoFiltered: '(disaring dari _MAX_ dara keseluruhan)',
                        paginate: {
                            first: "<i class='fas fa-angle-double-left'></i>",
                            last: "<i class='fas fa-angle-double-right'></i>",
                            previous: "<i class='fas fa-angle-left'></i>",
                            next: "<i class='fas fa-angle-right'></i>"
                        },
                    },
                    pagingType: 'full_numbers',
                    destroy: true,
                    searchDelay: 1500,
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    order: [
                        [0, 'asc']
                    ],
                    ajax: {
                        data: dataTableData,
                        url: url
                    },
                    columns: [{
                            className: 'align-middle text-center border-bottom',
                            data: 'year',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'semester',
                            // name:'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'activity.description',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'activity.output',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'jumlah',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'total_credit',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'approve_credit',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle text-center border-bottom',
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                let html = '';
                                let tempUrl = `${url}/${data.id}`
                                html +=
                                    `<button data-coreui-target="#canvasAddKegiatan" data-coreui-toggle="offcanvas" data-id="${data.id}" data-url="${tempUrl}" aria-controls="offcanvasRight" data-type="${kegiatanPenUrl == url ? 'penunjang' : 'utama'}" class="btn btn-success btn-sm text-white mx-1"><i class="fa fa-eye"></i></button>`;
                                return html;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: '_all',
                        defaultContent: '<div class="text-center align-middle">-</div>'
                    }],
                    buttons: [{
                        text: 'Refresh Data',
                        className: 'btn btn-primary btn-sm text-white',
                        action: function() {
                            datatable.ajax.reload()
                        }
                    }],
                    drawCallback: function(setting) {
                        if (addRow != undefined) {
                            table.append(addRow);
                            if (datatable.ajax.json().data.length == 0) {
                                table.find('.grand_total').text(0.00)
                            } else {
                                table.find('.grand_total').text(datatable.ajax.json().data[0].grand_total_credit.toFixed(2))
                                table.find('.grand_approve').text(datatable.ajax.json().data[0].grand_total_approve.toFixed(2))
                                grand_total_approve += datatable.ajax.json().data[0].grand_total_approve

                                $('#datatableDetailActivityPen').find('.grand_total_approve').text(grand_total_approve)
                            }
                        }
                    }
                });
                return datatable;
            }

            datatableDetail = initialDatatable($('#datatableDetailActivity'), kegiatanUrl, initial, customRowDetail);
            datatableDetailPen = initialDatatable($('#datatableDetailActivityPen'), kegiatanPenUrl, initial, customRowDetailPen);

            $(document).on('click', '.view-file', function(e) {
                e.preventDefault();
                $('#modalFile').modal('show')
                let url = `{{ url('storage') }}/${$(this).attr('data-src')}#toolbar=0`
                $('#modalFile embed').attr('src', url)
            })

            $('#dataPengajuan button[type="submit"]').on('click', function(e) {
                e.preventDefault();
                $('#dataPengajuan input[name="status"]').val($(this).attr('data-type'))
                let type = $(this).attr('data-type')
                let msg = ''
                if(type == 'PENGAJUAN'){
                    msg = `Menyimpan DUPAK sebagai DRAFT, Anda Yakin ?` 
                }else if(type ==  'TELAH DINILAI'){
                    msg = `Menyimpan DUPAK sebagai TELAH DINILAI, Anda Yakin ?` 
                }else if(type == 'REVISI'){
                    msg = `mengembalikan DUPAK untuk di REVISI ?` 
                }else if(type == 'TOLAK'){
                    msg = `Anda akan menolak DUPAK ini, Anda yakin ?`
                }

                Swal.fire({
                    title: msg,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lanjutkan!',
                    denyButtonText: `Tidak, Batalkan!`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $('#formPengajuan').submit()
                    }
                })
            })


            $('#element_id').on('change', function(e) {
                let url = '{{ route('get-sub-element') }}'
                let urlKegiatan = '{{ route('get-activity') }}'
                if ($('#activity_id').attr('name') == 'activity_id') {
                    urlKegiatan = '{{ route('get-activity') }}'
                } else {
                    urlKegiatan = '{{ route('get-activity-pen') }}'
                }
                $('#credit').val(null)
                $('#output').val(null)
                $('#jumlah').val(null)
                $('#total_credit').val(null)
                baseAjax(url, 'GET', function(response) {
                    $('#sub_element_id').empty().append('<option value="">-- Pilih Sub Unsur --</option>')
                    $.each(response, function(index, value) {
                        $('#sub_element_id').append(`<option value="${value.id}">${value.name}</option>`)
                    })
                }, {
                    element_id: $(this).val()
                })

                baseAjax(urlKegiatan, 'GET', function(response) {
                    $('#activity_id').empty().append('<option value="">-- Pilih Kegiatan --</option>')
                    $.each(response, function(index, value) {
                        $('#activity_id').append(`<option value="${value.id}" data-output="${value.output}" data-credit="${value.credit}">${value.description}</option>`)
                    })
                }, {
                    element_id: $(this).val()
                })
            })

            $('#sub_element_id').on('change', function() {
                if ($('#activity_id').attr('name') == 'activity_id') {
                    urlKegiatan = '{{ route('get-activity') }}'
                } else {
                    urlKegiatan = '{{ route('get-activity-pen') }}'
                }
                $('#credit').val(null)
                $('#output').val(null)
                $('#jumlah').val(null)
                $('#total_credit').val(null)
                baseAjax(urlKegiatan, 'GET', function(response) {
                    $('#activity_id').empty().append('<option value="">-- Pilih Kegiatan --</option>')
                    $.each(response, function(index, value) {
                        $('#activity_id').append(`<option value="${value.id}" data-output="${value.output}" data-credit="${value.credit}">${value.description}</option>`)
                    })
                }, {
                    sub_element_id: $(this).val()
                })
            })

            $('#activity_id').on('change', function(e) {
                let select = $(this)
                credit = select.find(`option[value="${select.val()}"]`).attr('data-credit')
                output = select.find(`option[value="${select.val()}"]`).attr('data-output')
                $('#credit').val(credit)
                $('#output').val(output)
                let total = $('#credit').val() * $('#jumlah').val()
                $('#total_credit').val(total.toFixed(2))
            })

            $('#jumlah').on('change', function(e) {
                let total = $('#credit').val() * $(this).val()
                $('#total_credit').val(total.toFixed(2))
            })

            $('#canvasAddKegiatan').on('show.coreui.offcanvas', function(e) {
                let btn = $(e.relatedTarget);
                let canvas = $(this);
                let form = canvas.find('form');
                let url = btn.attr('data-url')
                let activity = btn.data('type') == 'utama' ? 'activity_id' : 'pen_activity_id'
                let activity_id = btn.data('type') == 'utama' ? 'response.activity_id' : 'response.pen_activity_id'
                let tempUrl = `{!! route('penilai.nilai-detail', ['submission_id' => ' ', 'id' => ' ']) !!}`
                tempUrl = tempUrl.replace('%20', '{{ $submission->id }}')
                tempUrl = tempUrl.replace('%20', btn.attr('data-id'))
                $.each($('#element_id').find('option'), function(index, value) {
                    if (activity == 'activity_id') {
                        if ($(value).attr('data-type') == 'TUGAS') {
                            $(value).css({
                                'display':'block'
                            })
                        } else {
                            $(value).css({
                                'display':'none'
                            })
                        }
                    } else {
                        if ($(value).attr('data-type') == 'PPP') {
                            $(value).css({
                                'display':'block'
                            })
                        } else {
                            $(value).css({
                                'display':'none'
                            })
                        }
                    }
                })
                if (kegiatanPenUrl == url) {
                    tempUrl = tempUrl + '?type=' + btn.data('type')
                } else {
                    tempUrl = tempUrl + '?type=' + btn.data('type')
                }
                $('#activity_id').attr('name', activity);
                form.get(0).reset();
                canvas.find('form input[name="_method"]').remove();
                canvas.find('form input[name="id"]').remove();
                canvas.find('form select[name="sub_element_id"]').empty().append('<option value="" selected disabled>-- Pilih Sub Unsur --</option>');
                canvas.find('form select[name="' + activity + '"]').empty().append('<option value="" selected disabled>-- Pilih Kegiatan --</option>');
                form.attr('action', tempUrl);
                if (btn.attr('data-id') != undefined) {
                    let id = btn.attr('data-id')
                    canvas.find('button[type="submit"]').text('Simpan')
                    canvas.find('input[name="file_spt"]').removeAttr('required')
                    canvas.find('input[name="file_bukti1"]').removeAttr('required')
                    canvas.find('.offcanvas-title').text('Ubah Kegiatan')
                    form.append('<input type="hidden" name="_method" value="PUT"/>')
                    form.append('<input type="hidden" name="id" value="' + id + '"/>')
                    baseAjax(`${url}/edit`, 'GET', function(response) {
                        fillForm(form, [{
                                type: 'select',
                                content: 'select[name="year"]',
                                data: response.year
                            },
                            {
                                type: 'select',
                                content: 'select[name="semester"]',
                                data: response.semester
                            },
                            {
                                type: 'select',
                                content: 'select[name="match_position"]',
                                data: response.match_position
                            },
                            {
                                type: 'select',
                                content: 'select[name="element_id"]',
                                data: response.activity.element_id
                            },
                            {
                                type: 'select',
                                content: 'select[name="sub_element_id"]',
                                data: response.activity.sub_element_id,
                                timer: true
                            },
                            {
                                type: 'select',
                                content: 'select[name="' + activity + '"]',
                                data: eval(activity_id),
                                timer: true,
                                withTrigger: true
                            },
                            {
                                type: 'input',
                                content: 'input[name="jumlah"]',
                                data: response.jumlah,
                                withTrigger: true,
                                mustTrigger: true
                            }
                        ])
                        canvas.find('input[name="approve_credit"]').val(response.approve_credit)

                        if (user_level != 'prakom' && user_level != 'admin') {
                            canvas.find('input[name="approve_credit"]').removeAttr('disabled');
                        }
                        if (response.description != null && response.description != '') {
                            canvas.find('textarea[name="description"]').val(response.description)
                            canvas.find('textarea[name="description"]').prop('disabled', true);
                        } else {
                            if (user_level != 'prakom' && user_level != 'admin') {
                                canvas.find('textarea[name="description"]').removeAttr('disabled');
                            }
                        }
                        let files = ['file_spt', 'file_bukti1', 'file_bukti2', 'file_bukti3']
                        let bools = ['spt_valid', 'bukti1_valid', 'bukti2_valid', 'bukti3_valid']
                        $.each(files, function(idx, val) {
                            let varr = 'response.'
                            let tempVal = varr + val
                            let tempBool = varr + bools[idx]
                            let col = form.find(`button#${val}`).closest('.col-md-6');
                            if (eval(tempVal) != null && eval(tempVal) != '') {
                                col.css({
                                    'display': 'flex'
                                })
                                form.find(`button#${val}`).attr('data-src', eval(tempVal))
                                if (eval(tempBool)) {
                                    form.find(`input[name="${bools[idx]}"]`).prop('checked', true)
                                } else {
                                    form.find(`input[name="${bools[idx]}"]`).removeAttr('checked')
                                }
                            } else {
                                col.css({
                                    'display': 'none'
                                })
                            }
                        })
                    })
                } else {
                    canvas.find('input[name="file_spt"]').prop('required', true)
                    canvas.find('input[name="file_bukti1"]').prop('required', true)
                    canvas.find('button[type="submit"]').text('Simpan')
                    canvas.find('.offcanvas-title').text('Tambah Kegiatan')
                }
            });

            $(document).on('submit', '#formAddKegiatan', function(e) {
                e.preventDefault();

                formAjax($(this), undefined, function(data, status, jqxhr, form) {
                    baseSwal('success', 'Success', 'Data berhasil disimpan')
                    eval(data.datatable).ajax.reload()
                    $('#canvasAddKegiatan').find('.btn-close').trigger('click')
                })
            })
        })
    </script>
@endpush
