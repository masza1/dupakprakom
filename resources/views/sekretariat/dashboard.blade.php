@extends('layouts.app')

@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        @include('layouts.notification')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-primary-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>26K</h2>
                                    <div>Riwayat Pengajuan Dupak</div>
                                    <i class="fa fa-list-alt fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>13K</h2>
                                    <div>Selesai dinilai</div>
                                    <i class="fa fa-clipboard-check fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-warning-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>13</h2>
                                    <div>Pranata Komputer</div>
                                    <i class="fa fa-users fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-danger-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>10</h2>
                                    <div>Cetak PAK</div>
                                    <i class="fa fa-print fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h1>Selamat Datang, {{ auth()->user()->username }}!</h1>
                        <h4>Silahkan Input Pengajuan DUPAK Dengan Teliti dan Cermat <br>
                            Salam Sukses dan Selalu Semangat !!!</h4>
                    </div>
                </div>

            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection