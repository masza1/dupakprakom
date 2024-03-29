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
                                    <h2>{{ $total ?: 0 }}</h2>
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
                                    <h2>{{ array_key_exists('DRAFT', $submissions) ? $submissions['DRAFT'] : 0 }}</h2>
                                    <div>DRAFT</div>
                                    <i class="fa fa-clipboard-list fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>{{ array_key_exists('PENGAJUAN', $submissions) ? $submissions['PENGAJUAN'] : 0 }}</h2>
                                    <div>Pengajuan</div>
                                    <i class="fa fa-clipboard-list fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info-gradient" style="min-height: 120px; max-height: 140px;">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div style="position: relative; width: 100%">
                                    <h2>{{ array_key_exists('TELAH DINILAI', $submissions) ? $submissions['TELAH DINILAI'] : 0 }}</h2>
                                    <div>Telah Dinilai</div>
                                    <i class="fa fa-clipboard-check fa-lg" style="font-size: 40px; position: absolute; top:0px; right: 0px;"></i>
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

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Informasi Terbaru</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($news as $item)
                            <div class="card mb-3">
                                <div class="card-header" style="padding: 0.2rem 0.2rem;">
                                    <div class="card-title" style="margin-bottom: 0">
                                        <p style="margin-bottom: 0">posted {{ $item->posted_date }}</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection