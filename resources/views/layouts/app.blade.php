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
    @endauth
    @stack('offcanvas')
    @yield('body')

    @stack('modal')
    <x-base-modal id="modalDelete" :modalWidth="__('md')" :formId="__('formDelete')" withForm="true">
        <x-slot name="modalTitle">Hapus Data</x-slot>
        <x-slot name="formMethod">DELETE</x-slot>
        <x-slot name="buttonSubmit">
            <button class="btn btn-danger btn-sm text-white" type="submit">Hapus</button>
        </x-slot>
        <p>Anda yakin ingin menghapus data ini ?</p>

    </x-base-modal>
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
</body>

</html>
