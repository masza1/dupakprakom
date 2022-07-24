@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Riwayat Pengajuan</div>
                    <div class="card-body">
                        <table class="table table-striped border datatable w-100" id="datatableJabatan">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">Nomor</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Tanggal Pengajuan</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Nama Pegawai</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Masa Awal</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Masa Akhir</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Status</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Actions</th>
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
@push('js')
    <script>
        $(document).ready(function() {
            var initial = {}
            var datatableURL = '{{ route('sekretariat.index-riwayat') }}'
            var datatable;

            initialDatatable(initial);

            function initialDatatable(dataTableData) {
                datatable = $('#datatableJabatan').DataTable({
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
                    scrollX:true,
                    order: [
                        [0, 'asc']
                    ],
                    ajax: {
                        data: dataTableData,
                        url: datatableURL
                    },
                    columns: [{
                            className: 'align-middle text-center border-bottom',
                            data: 'number',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'submission_date',
                            // name:'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'employee.name',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'start_date',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'end_date',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'status',
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
                                let tempURL = '{{ route('sekretariat.cetak-pengajuan', ['submission_id' => ' ', 'employee_id' => ' ']) }}'
                                tempURL = tempURL.replace('%20', data.id)
                                tempURL = tempURL.replace('%20', data.employee.id)
                                html += `<a type="button" class="btn btn-sm btn-primary btnCetak" href="${tempURL}" target="_blank"><i class="fa fa-file-pdf"></i></a>`
                                return html;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: '_all',
                        defaultContent: '<div class="text-center align-middle">-</div>'
                    }],
                    buttons: [, {
                        text: 'Refresh Data',
                        className: 'btn btn-primary btn-sm text-white',
                        action: function() {
                            datatable.ajax.reload()
                        }
                    }]
                })
            }

            $(document).on('click', '#btnAddSubmission', function(e) {
                let btn = $(this)
                window.location = btn.attr('data-url')
            })

            $(document).on('submit', '#formDelete', function(e) {
                e.preventDefault()
                deleteData($(this), datatable)
            })
        })
    </script>
@endpush
