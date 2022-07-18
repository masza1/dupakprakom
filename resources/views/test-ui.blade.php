@extends('layouts.app')
@section('body')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <x-base-offcanvas id="canvasAddKegiatan" canvasTitle="Tambah Kegiatan" formId="formAddKegiatan" withForm="true" isScroll="true">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select id="year" name="year" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Tahun --</option>
                                    @for ($i = 2018; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select id="semester" name="semester" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Semester --</option>
                                    <option value="SEMESTER I">SEMESTER I</option>
                                    <option value="SEMESTER II">SEMESTER II</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select id="matching_position" name="matching_position" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Kesesuaian Jenjang Jabatan --</option>
                                    <option value="SESUAI">Sesuai jenjang</option>
                                    <option value="DIATAS">Satu Jenjang diatasnya</option>
                                    <option value="DIBAWAH">Satu Jenjang dibawahnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select id="sub_element_id" name="sub_element_id" class="form-control">
                                    <option value="" selected disabled>-- Pilih Sub Unsur --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select id="activity_id" name="activity_id" class="form-control select2" required>
                                    <option value="" selected disabled>-- Pilih Kegiatan --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="output" style="height: 800px" type="text" placeholder="Nama Kegiatan" disabled></textarea>
                                <label for="output">Output</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="credit" type="number" step="any" placeholder="Nama Kegiatan" disabled>
                                <label for="credit">Credit</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="jumlah" type="number" step="1" name="jumlah" placeholder="Tempat Lahir" required>
                                <label for="jumlah">Jumlah</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="total_credit" type="number" name="total_credit" step="any" placeholder="Tempat Lahir" required>
                                <label for="total_credit">Total Kredit</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="file_spt" class="form-label">File SPT</label>
                            <input class="form-control" id="file_spt" type="file" accept=".pdf" name="file_spt" required>
                        </div>
                        <div class="col-md-6">
                            <label for="file_bukti1" class="form-label">File Bukti 1</label>
                            <input class="form-control" id="file_bukti1" type="file" accept=".pdf" name="file_bukti1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="file_bukti2" class="form-label">File Bukti 2</label>
                            <input class="form-control" id="file_bukti2" type="file" accept=".pdf" name="file_bukti2">
                        </div>
                        <div class="col-md-6">
                            <label for="file_bukti3" class="form-label">File Bukti 3</label>
                            <input class="form-control" id="file_bukti3" type="file" accept=".pdf" name="file_bukti3">
                        </div>
                    </div>
                </x-base-offcanvas>
                <button data-coreui-target="#canvasAddKegiatan" data-coreui-toggle="offcanvas" aria-controls="offcanvasRight" class="btn btn-warning btn-sm text-white mx-1">Test Canvas</button>

            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
