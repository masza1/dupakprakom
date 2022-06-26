@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Data Sub Unsur</div>
                    <div class="card-body">
                        <table class="table table-striped border datatable w-100" id="datatableSubUnsur">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">No</th>
                                    <th class="text-center text-uppercase" style="width: 20%">Nama Unsur</th>
                                    <th class="text-center text-uppercase" style="width: 20%">Nama Sub Unsur</th>
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
    <x-base-modal id="modalAddSubUnsur" :modalWidth="__('md')" :formId="__('formAddSubUnsur')" withForm="true">
        <x-slot name="modalTitle">Tambah Sub Unsur</x-slot>
        <x-slot name="buttonSubmit">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
        </x-slot>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <select id="element_id" name="element_id" class="form-control" required>
                        <option value="" selected disabled>-- Pilih Unsur --</option>
                        @foreach ($unsurs as $item)
                        <option value="{{ $item->id }}">{{ $item->name. ' - ' . $item->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" type="text" name="name" placeholder="Nama Sub Unsur" required>
                    <label for="name">Nama Sub Unsur</label>
                </div>
            </div>
        </div>

    </x-base-modal>
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var initial = {}
            var datatableURL = '{{ route('sekretariat.sub-unsur.index') }}'
            var datatable;

            initialDatatable(initial);

            function initialDatatable(dataTableData) {
                datatable = $('#datatableSubUnsur').DataTable({
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
                            data: 'element.name',
                            // name:'name',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'name',
                        },
                        {
                            className: 'align-middle text-center border-bottom',
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                let html = '';
                                html += `<button class="btn btn-warning btn-sm text-white mx-1" data-coreui-target="#modalAddSubUnsur" data-coreui-toggle="modal" data-id="${data.id}" ><i class="fa fa-pencil-alt"></i></button>`;
                                html += `<button class="btn btn-danger btn-sm text-white mx-1" data-coreui-target="#modalDelete" data-coreui-toggle="modal" data-id="${data.id}" data-url="{!! route('sekretariat.sub-unsur.destroy', ['id' => ' ']) !!}" ><i class="fa fa-trash"></i></button>`;
                                return html;
                            }
                        }
                    ],
                    buttons: [{
                        text: 'Tambah Sub Unsur',
                        className: 'btn btn-success btn-sm text-white',
                        attr: {
                            id: 'btnAddUnsur',
                            'data-coreui-toggle': 'modal',
                            'data-coreui-target': '#modalAddSubUnsur',
                        },
                    }]
                })
            }

            $('#modalAddSubUnsur').on('show.coreui.modal', function(e) {
                let btn = $(e.relatedTarget)
                let modal = $(this)
                let url = '';
                let form = modal.find('form')
                form.get(0).reset();
                modal.find('form input[name="_method"]').remove();
                modal.find('form input[name="id"]').remove();
                if (btn.attr('data-id') != undefined) {
                    let id = btn.attr('data-id')
                    url = '{{ route('sekretariat.sub-unsur.update', ['id' => ' ']) }}'
                    url = url.replace('%20', id)
                    modal.find('button[type="submit"]').text('Ubah')
                    form.append('<input type="hidden" name="_method" value="PUT"/>')
                    form.append('<input type="hidden" name="id" value="'+id+'"/>')

                    baseAjax(url, 'GET', function(response) {
                        modal.find('input[name="name"]').val(response.name)
                        modal.find('select[name="element_id"]').val(response.element_id).trigger('change')
                    })
                } else {
                    url = '{!! route('sekretariat.sub-unsur.store') !!}'
                    modal.find('button[type="submit"]').text('Simpan')
                }
                form.attr('action', url);
            })

            $(document).on('submit', '#formAddSubUnsur', function(e) {
                e.preventDefault();
                let modal = $('#modalAddSubUnsur');

                formAjax($(this), modal, function(data, status, jqxhr, form, modal) {
                    modal.modal('hide')
                    datatable.ajax.reload()
                })
            })

            $(document).on('submit', '#formDelete', function(e){
                e.preventDefault()
                deleteData($(this), datatable)
            })
        })
    </script>
@endpush
