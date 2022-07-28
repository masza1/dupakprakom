@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Data Kegiatan</div>
                    <div class="card-body">
                        <table class="table table-striped border datatable w-100" id="datatableKegiatan">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">No</th>
                                    <th class="text-center text-uppercase" style="width: 10%">Jenjang</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Unsur</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Sub Unsur</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Uraian Kegiatan</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Output</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Angka Kredit</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Pelaksana Kegiatan</th>
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
@push('modal')
    <x-base-modal id="modalAddKegiatan" :modalWidth="__('lg')" :formId="__('formAddKegiatan')" withForm="true">
        <x-slot name="modalTitle">Tambah Kegiatan</x-slot>
        <x-slot name="buttonSubmit">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
        </x-slot>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <select id="position_id" name="position_id" class="form-control" required>
                        <option value="" selected disabled>-- Pilih Jabatan --</option>
                        @foreach ($positions as $item)
                            <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                        @endforeach
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
                    <select id="sub_element_id" name="sub_element_id" class="form-control" required>
                        <option value="" selected disabled>-- Pilih Sub Unsur --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <textarea class="form-control" style="resize: none; height:100px" id="description" name="description" placeholder="description" required></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input class="form-control" id="output" type="text" name="output" placeholder="Nama Kegiatan" required>
                    <label for="output">Output</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input class="form-control" id="credit" type="number" name="credit" step="any" placeholder="Tempat Lahir" required>
                    <label for="credit">Angka Kredit</label>
                </div>
            </div>
        </div>

    </x-base-modal>
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var initial = {}
            var datatableURL = '{{ route('sekretariat.activities.index') }}'
            var datatable;

            initialDatatable(initial);

            function initialDatatable(dataTableData) {
                datatable = $('#datatableKegiatan').DataTable({
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
                        url: datatableURL
                    },
                    columns: [{
                            className: 'align-middle text-center border-bottom',
                            data: null,
                            searchable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'position.level.level_name',
                            // name:'name',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'element.name',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'sub_element.name',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'description',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'output',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'credit',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'position.position_name',
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
                                html += `<button class="btn btn-warning btn-sm text-white mx-1" data-coreui-target="#modalAddKegiatan" data-coreui-toggle="modal" data-id="${data.id}" ><i class="fa fa-pencil-alt"></i></button>`;
                                html += `<button class="btn btn-danger btn-sm text-white mx-1" data-coreui-target="#modalDelete" data-coreui-toggle="modal" data-id="${data.id}" data-url="{!! route('sekretariat.activities.destroy', ['id' => ' ']) !!}" ><i class="fa fa-trash"></i></button>`;
                                return html;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: '_all',
                        defaultContent: '<div class="text-center align-middle">-</div>'
                    }],
                    buttons: [{
                        text: 'Tambah Kegiatan',
                        className: 'btn btn-success btn-sm text-white',
                        attr: {
                            id: 'btnAddKegiatan',
                            'data-coreui-toggle': 'modal',
                            'data-coreui-target': '#modalAddKegiatan',
                        },
                    }, {
                        text: 'Refresh Data',
                        className: 'btn btn-primary btn-sm text-white',
                        action: function(){
                            datatable.ajax.reload()
                        }
                    }]
                })
            }

            $('#element_id').on('change', function() {
                let val = $(this).val()
                if (val == '') {
                    $('#sub_element_id').empty().append('<option value="" selected disabled>-- Pilih Sub Unsur --</option>')
                } else {
                    let url = '{{ route('get-sub-element') }}'
                    baseAjax(url + '?element_id=' + val, 'GET', function(response) {
                        $('#sub_element_id').empty().append('<option value="" selected disabled>-- Pilih Sub Unsur --</option>')
                        $.each(response, function(index, value){
                            $('#sub_element_id').append(`<option value="${value.id}">${value.name}</option>`)
                        })
                    })
                }
            })

            $('#modalAddKegiatan').on('show.coreui.modal', function(e) {
                let btn = $(e.relatedTarget)
                let modal = $(this)
                let url = '';
                let form = modal.find('form')
                form.get(0).reset();
                modal.find('form input[name="_method"]').remove();
                modal.find('form input[name="id"]').remove();
                modal.find('form select[name="sub_element_id"]').empty().append('<option value="" selected disabled>-- Pilih Sub Unsur --</option>');
                if (btn.attr('data-id') != undefined) {
                    let id = btn.attr('data-id')
                    url = '{{ route('sekretariat.activities.update', ['id' => ' ']) }}'
                    url = url.replace('%20', id)
                    modal.find('button[type="submit"]').text('Ubah')
                    form.append('<input type="hidden" name="_method" value="PUT"/>')
                    form.append('<input type="hidden" name="id" value="' + id + '"/>')

                    baseAjax(url, 'GET', function(response) {
                        fillForm(modal, [{
                                type: 'textarea',
                                content: 'textarea[name="description"]',
                                data: response.description
                            },
                            {
                                type: 'input',
                                content: 'input[name="credit"]',
                                data: response.credit
                            },
                            {
                                type: 'input',
                                content: 'input[name="output"]',
                                data: response.output
                            },
                            {
                                type: 'select',
                                content: 'select[name="element_id"]',
                                data: response.element_id
                            },
                            {
                                type: 'select',
                                content: 'select[name="sub_element_id"]',
                                data: response.sub_element_id,
                                timer: true
                            },
                            {
                                type: 'select',
                                content: 'select[name="position_id"]',
                                data: response.position_id
                            }
                        ])
                    })
                } else {
                    url = '{!! route('sekretariat.activities.store') !!}'
                    modal.find('button[type="submit"]').text('Simpan')
                }
                form.attr('action', url);
            })

            $(document).on('submit', '#formAddKegiatan', function(e) {
                e.preventDefault();
                let modal = $('#modalAddKegiatan');

                formAjax($(this), modal, function(data, status, jqxhr, form, modal) {
                    baseSwal('success', 'Success', 'Data berhasil disimpan')
                    modal.modal('hide')
                    datatable.ajax.reload()
                })
            })

            $(document).on('submit', '#formDelete', function(e) {
                e.preventDefault()
                deleteData($(this), datatable)
            })
        })
    </script>
@endpush
