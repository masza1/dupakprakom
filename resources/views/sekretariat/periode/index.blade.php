@extends('layouts.app')
@section('body')
    @include('layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    @include('layouts.notification')
                    <div class="card-header">Periode penilaian</div>
                    <div class="card-body">
                        <form action="{{ route('sekretariat.periode.index') }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $periode->id ?? '' }}">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <select id="year" name="year" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Tahun --</option>
                                            @for ($i = 2019; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}" {{ (old('year') ?? $periode->year) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <select id="semester" name="semester" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Semester --</option>
                                            <option value="Semester 1" {{ (old('semester') ?? $periode->semester) == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                                            <option value="Semester 2" {{ (old('semester') ?? $periode->semester) == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="start_date" type="date" name="start_date" placeholder="Nama Unsur" value="{{ old('start_date') ?? $periode->start_date }}" required>
                                        <label for="start_date">Tanggal Awal Penilaian</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="end_date" type="date" name="end_date" placeholder="Nama Unsur" value="{{ old('end_date') ?? $periode->end_date }}" required>
                                        <label for="end_date">Tanggal Akhir Penilaian</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                    </div>
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
