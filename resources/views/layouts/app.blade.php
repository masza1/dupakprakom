<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dupak Prakom - {{ $title ?? 'Selamat Datang' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet') }}">
    <style>
        .alert {
            padding: 0.3rem 0.3rem !important;
            margin-bottom: 0px !important;
        }
    </style>
    @stack('css')
</head>

<body>
    @if (!isset($cetak))
        <img id="loading" src="{{ asset('assets/img/Spinner-1s-200px.svg') }}" alt="*"
            style="width: 90px; 
            position: absolute;
            top: 110px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 99999;
            display: none;
            ">
        @auth
            @include('layouts.navigation')
            <x-base-offcanvas id="canvasEditProfile" canvasTitle="Ubah Profil" formId="formEditProfile" formMethod="PUT" withForm="true">
                <x-slot name="buttonSubmit"><button class="btn btn-primary btn-sm" type="submit">Simpan</button></x-slot>
                <div class="w-100">
                    <div class="card">
                        <div class="card-header">Akun</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" name="email" placeholder="Nama Penilai" readonly>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" name="password" placeholder="Nama Penilai">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Nama Penilai">
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
                                        <select id="group_id" name="group_id" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Golongan --</option>
                                            @foreach ($groups as $item)
                                                <option value="{{ $item->id }}">{{ $item->group_name . ' - ' . $item->rank }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                        <select id="unit_id" name="unit_id" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Unit Kerja --</option>
                                            @foreach ($units as $item)
                                                <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- @if (auth()->user()->level == 'prakom')
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="tmt" type="date" name="tmt" placeholder="Tempat Lahir" required>
                                            <label for="tmt">TMT</label>
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
                                    <div class="col-md-6">
                                        <label for="">Masa Kerja Lama</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="tahun_lama" type="number" name="tahun_lama" step="1" min="0" max="" placeholder="Tempat Lahir" required>
                                                    <label for="tahun_lama">Tahun</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="bulan_lama" type="number" name="bulan_lama" step="1" min="1" max="12" placeholder="Tempat Lahir" required>
                                                    <label for="bulan_lama">Bulan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Masa Kerja Baru</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="tahun_baru" type="number" name="tahun_baru" step="1" min="0" max="" placeholder="Tempat Lahir" required>
                                                    <label for="tahun_baru">Tahun</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="bulan_baru" type="number" name="bulan_baru" step="1" min="1" max="12" placeholder="Tempat Lahir" required>
                                                    <label for="bulan_baru">Bulan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </x-base-offcanvas>
        @endauth
        @stack('offcanvas')

    @endif
    @yield('body')

    @if (!isset($cetak))
        @stack('modal')
        <x-base-modal id="modalDelete" :modalWidth="__('md')" :formId="__('formDelete')" withForm="true">
            <x-slot name="modalTitle">Hapus Data</x-slot>
            <x-slot name="formMethod">DELETE</x-slot>
            <x-slot name="buttonSubmit">
                <button class="btn btn-danger btn-sm text-white" type="submit">Hapus</button>
            </x-slot>
            <p>Anda yakin ingin menghapus data ini ?</p>

        </x-base-modal>
    @endif
    <script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>

    {{-- <script src="{{ asset('vendors/chart.js/js/chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script> --}}
    <script src="{{ asset('vendors/@coreui/utils/js/coreui-utils.js') }}"></script>

    <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/jquery-form.min.js') }}"></script>
    <script src="{{ asset('js/base-function.js') }}"></script>
    @if (!isset($cetak))
        @stack('js')
        <script>
            $(document).ready(function() {
                $('.sidebar-form-lg .sidebar-close').on('click', function() {
                    if (!$('.sidebar-form-lg').hasClass('hide')) {
                        $('.sidebar-form-lg').addClass('hide')
                    }
                })

                // var elementPosition = $('.sidebar-static');

                // $('.sidebar-form-lg').scroll(function() {
                //     if (!$('.sidebar-form-lg').hasClass('hide')) {
                //         if ($('.sidebar-form-lg').scrollTop() > elementPosition.height()) {
                //             if(!$('.sidebar-form-lg:not(.hide) .sidebar-static').hasClass('to-fixed')){
                //                 $('.sidebar-form-lg:not(.hide) .sidebar-static').addClass('to-fixed');
                //                 $('.sidebar-form-lg:not(.hide) .body-canvas').css('margin-top', elementPosition.height())
                //             }
                //         } else {
                //             if($('.sidebar-form-lg:not(.hide) .sidebar-static').hasClass('to-fixed')){
                //                 $('.sidebar-form-lg:not(.hide) .sidebar-static').removeClass('to-fixed');
                //                 $('.sidebar-form-lg:not(.hide) .body-canvas').css('margin-top', 0)

                //             }
                //         }
                //     }
                // });
            })
        </script>
        @auth
            <script>
                $(document).ready(function() {
                    $('#canvasEditProfile').on('show.coreui.offcanvas', function(e) {
                        let employee = JSON.parse('{!! auth()->user() !!}')
                        let btn = $(e.relatedTarget);
                        let canvas = $(this);
                        let form = canvas.find('form');
                        let url = '{{ route('sekretariat.users.update', ['id' => ' ']) }}'
                        url = url.replace('%20', employee.id)
                        form.get(0).reset();
                        form.attr('action', url);

                        fillForm(form, [{
                                type: 'input',
                                content: 'input[name="email"]',
                                data: employee.email,
                            },
                            {
                                type: 'input',
                                content: 'input[name="nip"]',
                                data: employee.employee.nip,
                            },
                            {
                                type: 'input',
                                content: 'input[name="name"]',
                                data: employee.employee.name,
                            },
                            {
                                type: 'input',
                                content: 'input[name="birthplace"]',
                                data: employee.employee.birthplace,
                            },
                            {
                                type: 'input',
                                content: 'input[name="birthdate"]',
                                data: employee.employee.birthdate,
                            },
                            {
                                type: 'select',
                                content: 'select[name="gender"]',
                                data: employee.employee.gender,
                            },
                            {
                                type: 'select',
                                content: 'select[name="group_id"]',
                                data: employee.employee.group_id,
                            },
                            {
                                type: 'select',
                                content: 'select[name="position_id"]',
                                data: employee.employee.position_id,
                            },
                            {
                                type: 'select',
                                content: 'select[name="unit_id"]',
                                data: employee.employee.unit_id,
                            },
                            {
                                type: 'select',
                                content: 'select[name="jenjang_pendidikan"]',
                                data: employee.employee.jenjang_pendidikan,
                            },
                            {
                                type: 'input',
                                content: 'input[name="institusi"]',
                                data: employee.employee.institusi,
                            },
                            {
                                type: 'input',
                                content: 'input[name="tmt"]',
                                data: employee.employee.tmt,
                            },
                            {
                                type: 'input',
                                content: 'input[name="bulan_lama"]',
                                data: employee.employee.bulan_lama,
                            },
                            {
                                type: 'input',
                                content: 'input[name="tahun_lama"]',
                                data: employee.employee.tahun_lama,
                            },
                            {
                                type: 'input',
                                content: 'input[name="bulan_baru"]',
                                data: employee.employee.bulan_baru,
                            },
                            {
                                type: 'input',
                                content: 'input[name="tahun_baru"]',
                                data: employee.employee.tahun_baru,
                            },
                        ])
                    })

                    $('#formEditProfile').on('submit', function(e) {
                        e.preventDefault();

                        formAjax($(this), undefined, function(data, status, jqxhr, form) {
                            $('#canvasAddKegiatan').find('.btn-close').trigger('click')
                        })
                    })
                })
            </script>
        @endauth
    @endif
</body>

</html>
