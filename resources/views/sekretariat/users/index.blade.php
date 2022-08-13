@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Data Penilai</div>
                    <div class="card-body">
                        <table class="table table-striped border datatable w-100" id="datatablePenilai">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 5%">No</th>
                                    <th class="text-center text-uppercase" style="width: 10%">NIP</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Email</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Username</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Nama</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Jenis Kelamin</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Jenjang Pendidikan</th>
                                    <th class="text-center text-uppercase" style="width: 15%">Institusi</th>
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
    <x-base-modal id="modalAddPenilai" :modalWidth="__('lg')" :formId="__('formAddPenilai')" withForm="true">
        <x-slot name="modalTitle">Tambah Penilai</x-slot>
        <x-slot name="buttonSubmit">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
        </x-slot>

        <div class="card">
            <div class="card-header">Akun</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Nama Penilai" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" name="username" placeholder="Nama Penilai" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Nama Penilai" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Nama Penilai" required>
                            <label for="password_confirmation">Konfirmasi Password</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Detail</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==18) return false;" class="form-control" id="nip" name="nip" placeholder="NIP" required>
                            <label for="nip">NIP</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Nama Penilai" required>
                            <label for="name">Nama Penilai</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="birthplace" type="text" name="birthplace" placeholder="Tempat Lahir" required>
                            <label for="birthplace">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="birthdate" type="date" name="birthdate" placeholder="Tempat Lahir" required>
                            <label for="birthdate">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <select id="jenjang_pendidikan" name="jenjang_pendidikan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Jenjang Pendidikan --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="institusi" type="text" name="institusi" placeholder="Tempat Lahir" required>
                            <label for="institusi">Institusi</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-base-modal>
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var initial = {}
            var datatableURL = '{{ route('sekretariat.users.index') }}'
            var datatable;

            initialDatatable(initial);

            function initialDatatable(dataTableData) {
                datatable = $('#datatablePenilai').DataTable({
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
                            data: 'employee.nip',
                            // name:'name',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'email',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'username',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'employee.name',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'employee.gender',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'employee.jenjang_pendidikan',
                            orderable: true,
                            searchable: true,
                        },
                        {
                            className: 'align-middle border-bottom',
                            data: 'employee.institusi',
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
                                html += `<button class="btn btn-warning btn-sm text-white mx-1" data-coreui-target="#modalAddPenilai" data-coreui-toggle="modal" data-id="${data.id}" ><i class="fa fa-pencil-alt"></i></button>`;
                                html += `<button class="btn btn-danger btn-sm text-white mx-1" data-coreui-target="#modalDelete" data-coreui-toggle="modal" data-id="${data.id}" data-url="{!! route('sekretariat.users.destroy', ['id' => ' ']) !!}" ><i class="fa fa-trash"></i></button>`;
                                return html;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: '_all',
                        defaultContent: '<div class="text-center align-middle">-</div>'
                    }],
                    buttons: [{
                        text: 'Tambah Penilai',
                        className: 'btn btn-success btn-sm text-white',
                        attr: {
                            id: 'btnAddPenilai',
                            'data-coreui-toggle': 'modal',
                            'data-coreui-target': '#modalAddPenilai',
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

            $('#modalAddPenilai').on('show.coreui.modal', function(e) {
                let btn = $(e.relatedTarget)
                let modal = $(this)
                let url = '';
                let form = modal.find('form')
                form.get(0).reset();
                modal.find('form input[name="_method"]').remove();
                modal.find('form input[name="id"]').remove();
                if (btn.attr('data-id') != undefined) {
                    let id = btn.attr('data-id')
                    url = '{{ route('sekretariat.users.update', ['id' => ' ']) }}'
                    url = url.replace('%20', id)
                    modal.find('button[type="submit"]').text('Ubah')
                    form.append('<input type="hidden" name="_method" value="PUT"/>')
                    form.append('<input type="hidden" name="id" value="' + id + '"/>')
                    modal.find('input[type="password"]').removeAttr('required')

                    baseAjax(url, 'GET', function(response) {
                        modal.find('input[name="email"]').val(response.email)
                        modal.find('input[name="username"]').val(response.username)
                        modal.find('input[name="nip"]').val(response.employee.nip)
                        modal.find('input[name="name"]').val(response.employee.name)
                        modal.find('input[name="birthplace"]').val(response.employee.birthplace)
                        modal.find('input[name="birthdate"]').val(response.employee.birthdate)
                        modal.find('select[name="gender"]').val(response.employee.gender).trigger('change')
                        modal.find('select[name="jenjang_pendidikan"]').val(response.employee.jenjang_pendidikan).trigger('change')
                        modal.find('select[name="institusi"]').val(response.employee.institusi).trigger('change')
                    })
                } else {
                    modal.find('input[type="password"]').prop('required', true)
                    url = '{!! route('sekretariat.users.store') !!}'
                    modal.find('button[type="submit"]').text('Simpan')
                }
                form.attr('action', url);
            })

            $(document).on('submit', '#formAddPenilai', function(e) {
                e.preventDefault();
                let modal = $('#modalAddPenilai');

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
