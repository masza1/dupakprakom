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
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <button class="card-header btn btn-secondary d-flex justify-content-start" data-coreui-toggle="collapse" data-coreui-target="#createSubmission" aria-expanded="true" aria-controls="createSubmission">
                        {{ !request()->routeIs('prakom.pengajuan.create') ? 'Ubah' : 'Tamabah' }} Pengajuan
                    </button>
                    <div class="card-body collapse {{ !request()->routeIs('prakom.pengajuan.create') ? '' : 'show' }}" id="createSubmission">
                        <form action="{{ request()->routeIs('prakom.pengajuan.create') ? route('prakom.pengajuan.store') : route('prakom.pengajuan.update', ['id' => $submission->id]) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @if (!request()->routeIs('prakom.pengajuan.create'))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $submission->id ?? '' }}">
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="surat_pengantar" class="form-label">Surat Pengantar *maks 1MB</label>
                                    <input type="file" name="surat_pengantar" id="surat_pengantar" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="matriks_pengajuan" class="form-label">Matriks Pengajuan *maks 1MB</label>
                                    <input type="file" name="matriks_pengajuan" id="matriks_pengajuan" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="sk_pangkat" class="form-label">SK Pangkat *maks 1MB</label>
                                    <input type="file" name="sk_pangkat" id="sk_pangkat" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="sk_kenaikan" class="form-label">SK Kenaikan *maks 1MB</label>
                                    <input type="file" name="sk_kenaikan" id="sk_kenaikan" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="pak_terakhir" class="form-label">PAK Terakhir *maks 1MB</label>
                                    <input type="file" name="pak_terakhir" id="pak_terakhir" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="skp1" class="form-label">SKP 1 Tahun Terakhir *maks 1MB</label>
                                    <input type="file" name="skp1" id="skp1" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="skp2" class="form-label">SKP 2 Tahun Terakhir *maks 1MB</label>
                                    <input type="file" name="skp2" id="skp2" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="ijazah" class="form-label">Ijazah *maks 1MB</label>
                                    <input type="file" name="ijazah" id="ijazah" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <label for="spmk" class="form-label">SPMK *maks 1MB</label>
                                    <input type="file" name="spmk" id="spmk" class="form-control dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf" accept=".pdf" required>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" style="resize: none; height:100px" id="catatan_penilai" placeholder="catatan_penilai" disabled></textarea>
                                        <label for="catatan_penilai">Catatan Penilai</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (!request()->routeIs('prakom.pengajuan.create'))
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
                                        <th class="text-center text-uppercase" style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
@push('offcanvas')
    @if (!request()->routeIs('prakom.pengajuan.create'))
        <x-base-offcanvas id="canvasAddKegiatan" canvasTitle="Tambah Kegiatan" formId="formAddKegiatan" withForm="true">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="year" name="year" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Tahun --</option>
                            @for ($i = 2018; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="semester" name="semester" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Semester --</option>
                            <option value="SEMESTER I">SEMESTER I</option>
                            <option value="SEMESTER II">SEMESTER II</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="match_position" name="match_position" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Kesesuaian Jenjang Jabatan --</option>
                            <option value="SESUAI">Sesuai jenjang</option>
                            <option value="DIATAS">Satu Jenjang diatasnya</option>
                            <option value="DIBAWAH">Satu Jenjang dibawahnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="element_id" name="element_id" class="form-control" required>
                            <option value="" selected>-- Pilih Unsur --</option>
                            @foreach ($elements as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="sub_element_id" name="sub_element_id" class="form-control">
                            <option value="" selected disabled>-- Pilih Sub Unsur --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <select id="activity_id" name="activity_id" class="form-control select2" required>
                            <option value="" selected disabled>-- Pilih Kegiatan --</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" style="resize: none; height:100px" id="description" name="description" placeholder="description" required></textarea>
                        <label for="description">Description</label>
                    </div>
                </div> --}}
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
                        <input class="form-control" id="jumlah" type="number" step="1" name="jumlah" placeholder="Tempat Lahir" required>
                        <label for="jumlah">Jumlah</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="total_credit" type="number" name="total_credit" step="any" placeholder="Tempat Lahir" required>
                        <label for="total_credit">Total Kredit</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="file_spt" class="form-label">File SPT</label>
                    <input class="form-control" id="file_spt" type="file" accept=".pdf" name="file_spt" required>
                </div>
                <div class="col-md-6">
                    <label for="file_bukti1" class="form-label">File Bukti 1</label>
                    <input class="form-control" id="file_bukti1" type="file" accept=".pdf" name="file_bukti1" required>
                </div>
                <div class="col-md-6">
                    <label for="file_bukti2" class="form-label">File Bukti 2</label>
                    <input class="form-control" id="file_bukti2" type="file" accept=".pdf" name="file_bukti2">
                </div>
                <div class="col-md-6">
                    <label for="file_bukti3" class="form-label">File Bukti 3</label>
                    <input class="form-control" id="file_bukti3" type="file" accept=".pdf" name="file_bukti3">
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="approve_credit" type="number" name="approve_credit" step="any" placeholder="Tempat Lahir" disabled>
                        <label for="approve_credit">Nilai yang disetujui</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" style="resize: none; height:100px" id="description" name="description" placeholder="description" disabled></textarea>
                        <label for="description">Catatan Penilai</label>
                    </div>
                </div>
            </div>
        </x-base-offcanvas>
    @endif
@endpush
@push('modal')
    <x-base-modal id="modalFile" :modalWidth="__('lg')">
        <embed src="" type="application/pdf" width="100%" style="height: 100vh">
    </x-base-modal>
@endpush
@push('js')
    <script>
        var submission = {!! $submission !!}
        $(document).ready(function() {
            $('.dropify').dropify();
            if (submission.id != undefined && submission.number != undefined) {
                resetPreview($('input[name="surat_pengantar"]'), 'storage/' + submission.surat_pengantar, 'surat pengantar');
                resetPreview($('input[name="matriks_pengajuan"]'), 'storage/' + submission.matriks_pengajuan, 'matriks pengajuan');
                resetPreview($('input[name="sk_pangkat"]'), 'storage/' + submission.sk_pangkat, 'sk pangkat');
                resetPreview($('input[name="sk_kenaikan"]'), 'storage/' + submission.sk_kenaikan, 'sk kenaikan');
                resetPreview($('input[name="pak_terakhir"]'), 'storage/' + submission.pak_terakhir, 'pak terakhir');
                resetPreview($('input[name="skp1"]'), 'storage/' + submission.skp1, 'skp1');
                resetPreview($('input[name="skp2"]'), 'storage/' + submission.skp2, 'skp2');
                resetPreview($('input[name="ijazah"]'), 'storage/' + submission.ijazah, 'ijazah');
                resetPreview($('input[name="spmk"]'), 'storage/' + submission.spmk, 'spmk');
                $('#catatan_penilai').text(submission.catatan_penilai)
            }

            function resetPreview(input, src = '', fname = '') {
                let url = '{{ url('/') }}'
                let wrapper = input.closest('.dropify-wrapper');
                let preview = wrapper.find('.dropify-preview');
                let filename = wrapper.find('.dropify-filename-inner');
                let render = wrapper.find('.dropify-render').html('');

                if (src == '' && fname == '') {
                    wrapper.find('.dropify-clear').click()
                } else {
                    wrapper.removeClass('has-error').addClass('has-preview');

                    if (src.includes('.jpg') || src.includes('.jpeg') || src.includes('.png')) {
                        filename.html(fname + '.jpg');
                        input.val('').attr('title', fname + '.jpg');
                        render.append($('<img />').attr('src', url + '/' + src).css('max-height', input.data('height') || ''));
                    } else if (src.includes('.pdf')) {
                        filename.html(fname + '.pdf');
                        input.val('').attr('title', fname + '.pdf');
                        render.append('<i class="dropify-font-file"></i><span class="dropify-extension">pdf</span>')
                    }

                    preview.fadeIn();
                }
            }
        })
    </script>
@endpush
@push('js')
    @if (!request()->routeIs('prakom.pengajuan.create'))
        <script>
            $(document).ready(function() {
                $('.select2').select2()
                var initial = {};
                var kegiatanUrl = '{{ route('prakom.detail-kegitan.index', ['submission' => ' ']) }}';
                var kegiatanPenUrl = '{{ route('prakom.detail-kegitan-pen.index', ['submission' => ' ']) }}';
                kegiatanUrl = kegiatanUrl.replace('%20', submission.id)
                kegiatanPenUrl = kegiatanPenUrl.replace('%20', submission.id)
                var datatableDetail, datatableDetailPen;
                var customRowDetail =
                    '<tr>' +
                    '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Angka Kredit Kegiatan Tugas</td>' +
                    '<td class="align-middle fw-bold grand_total">-</td>' +
                    '<td></td>' +
                    '</tr>'
                var customRowDetailPen =
                    '<tr>' +
                    '<td colspan="5" class="text-left align-middle fw-bold">Jumlah Angka Kredit Kegiatan Penunjang</td>' +
                    '<td class="align-middle fw-bold grand_total">-</td>' +
                    '<td>-</td>' +
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
                                className: 'align-middle text-center border-bottom',
                                data: null,
                                orderable: false,
                                searchable: false,
                                render: function(data, type, row) {
                                    let html = '';
                                    let tempUrl = `${url}/${data.id}`
                                    let csrf = '<input type="hidden" name="_token" value="{!! csrf_token() !!}">'
                                    let method = '<input type="hidden" name="_method" value="PUT">'
                                    html +=
                                        `<button data-coreui-target="#canvasAddKegiatan" data-coreui-toggle="offcanvas" data-id="${data.id}" data-url="${tempUrl}" aria-controls="offcanvasRight" data-type="${kegiatanPenUrl == url ? 'penunjang' : 'utama'}" class="btn btn-warning btn-sm text-white mx-1"><i class="fa fa-pencil-alt"></i></button>`;
                                    html += `<button class="btn btn-danger btn-sm text-white mx-1" data-coreui-target="#modalDelete" data-coreui-toggle="modal" data-id="${data.id}" data-url="${tempUrl}" ><i class="fa fa-trash"></i></button>`;
                                    return html;
                                }
                            }
                        ],
                        columnDefs: [{
                            targets: '_all',
                            defaultContent: '<div class="text-center align-middle">-</div>'
                        }],
                        buttons: [{
                                text: 'Tambah Detail Kegiatan',
                                className: 'btn btn-success btn-sm text-white',
                                attr: {
                                    'data-coreui-toggle': "offcanvas",
                                    'data-coreui-target': "#canvasAddKegiatan",
                                    'aria-controls': "offcanvasRight",
                                    'data-type': kegiatanPenUrl == url ? 'penunjang' : 'utama',
                                    'data-url': url
                                }
                            },
                            {
                                text: 'Refresh Data',
                                className: 'btn btn-primary btn-sm text-white',
                                action: function() {
                                    datatable.ajax.reload()
                                }
                            }
                        ],
                        drawCallback: function(setting) {
                            if (addRow != undefined) {
                                table.append(addRow);
                                if (datatable.ajax.json().data.length == 0) {
                                    table.find('.grand_total').text(0.00)
                                } else {
                                    table.find('.grand_total').text(datatable.ajax.json().data[0].grand_total_credit.toFixed(2))
                                }
                            }
                        }
                    });
                    return datatable;
                }

                datatableDetail = initialDatatable($('#datatableDetailActivity'), kegiatanUrl, initial, customRowDetail);
                datatableDetailPen = initialDatatable($('#datatableDetailActivityPen'), kegiatanPenUrl, initial, customRowDetailPen);

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

                $('input[type="file"]').change(function() {
                    var MAX_FILE_SIZE = 2 * 1024 * 1024;
                    fileSize = this.files[0].size;
                    if (fileSize > MAX_FILE_SIZE) {
                        this.setCustomValidity("File must not exceed 2 MB!");
                        this.reportValidity();
                        $(this).val(null)
                    } else {
                        this.setCustomValidity("");
                    }
                });

                $('#canvasAddKegiatan').on('show.coreui.offcanvas', function(e) {
                    let btn = $(e.relatedTarget);
                    let canvas = $(this);
                    let form = canvas.find('form');
                    let url = btn.attr('data-url')
                    let activity = btn.data('type') == 'utama' ? 'activity_id' : 'pen_activity_id'
                    let activity_id = btn.data('type') == 'utama' ? 'response.activity_id' : 'response.pen_activity_id'
                    $('#activity_id').attr('name', activity);
                    form.get(0).reset();
                    canvas.find('form input[name="_method"]').remove();
                    canvas.find('form input[name="id"]').remove();
                    canvas.find('button.view-file').remove()
                    canvas.find('form select[name="sub_element_id"]').empty().append('<option value="" selected disabled>-- Pilih Sub Unsur --</option>');
                    canvas.find('form select[name="' + activity + '"]').empty().append('<option value="" selected disabled>-- Pilih Kegiatan --</option>');
                    form.attr('action', url);
                    if (btn.attr('data-id') != undefined) {
                        let id = btn.attr('data-id')
                        canvas.find('button[type="submit"]').text('Ubah')
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
                                },
                                {
                                    type: 'file',
                                    content: 'label[for="file_spt"]',
                                    data: response.file_spt,
                                    addButton: true,
                                },
                                {
                                    type: 'file',
                                    content: 'label[for="file_bukti1"]',
                                    data: response.file_bukti1,
                                    addButton: true,
                                },
                                {
                                    type: 'file',
                                    content: 'label[for="file_bukti2"]',
                                    data: response.file_bukti2,
                                    addButton: true,
                                },
                                {
                                    type: 'file',
                                    content: 'label[for="file_bukti3"]',
                                    data: response.file_bukti3,
                                    addButton: true,
                                },
                            ])

                            canvas.find('input[name="approve_credit"]').val(response.approve_credit)
                            canvas.find('textarea[name="description"]').val(response.description)
                        })
                    } else {
                        canvas.find('input[name="file_spt"]').prop('required', true)
                        canvas.find('input[name="file_bukti1"]').prop('required', true)
                        canvas.find('button[type="submit"]').text('Simpan')
                        canvas.find('.offcanvas-title').text('Tambah Kegiatan')
                    }
                });

                $(document).on('click', '.view-file', function(e) {
                    e.preventDefault();
                    $('#modalFile').modal('show')
                    let url = `{{ url('storage') }}/${$(this).attr('data-src')}#toolbar=0`
                    $('#modalFile embed').attr('src', url)
                })

                $(document).on('submit', '#formAddKegiatan', function(e) {
                    e.preventDefault();

                    formAjax($(this), undefined, function(data, status, jqxhr, form) {
                        $('#canvasEditProfile').find('.btn-close').trigger('click')
                    })
                })

                $(document).on('submit', '#formDelete', function(e) {
                    e.preventDefault()
                    deleteData($(this), undefined, function(data) {
                        eval(data.datatable).ajax.reload()
                    })
                })
            })
        </script>
    @endif
@endpush
