@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Penanda Tangan</div>
                    <div class="card-body">
                        <form action="{{ route('sekretariat.tanda-tangan') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tanda->id ?? '' }}">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==18) return false;" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ $tanda->nip ?? old('nip') }}" required>
                                    <label for="nip">NIP</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name" value="{{ $tanda->name ?? old('name') }}" placeholder="Nama Penilai" required>
                                    <label for="name">Nama Pejabat</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="jabatan" type="text" name="jabatan" value="{{ $tanda->jabatan ?? old('jabatan') }}" placeholder="Nama Penilai" required>
                                    <label for="jabatan">Jabatan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
