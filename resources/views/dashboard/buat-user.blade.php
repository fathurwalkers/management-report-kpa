@extends('layouts.dashboard-layout')

@section('title', 'Beranda - PT. Kartika Prima Abadi')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6 mt-1">
                <h4 class="m-0">
                    <b>
                        Beranda
                    </b>
                </h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <b>
                                Dashboard
                            </b>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('main-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <h4 class="text-center">
                                        <b>HALAMAN REGISTRASI USER KARYAWAN BARU</b>
                                    </h4>
                                </div>
                            </div>

                            <hr />

                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="alert alert-info">
                                            {{ session('status') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <form id="buat-form" action="{{ route('proses-buat-user') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="changeForm">Pilih jika untuk Head Office</label>
                                                    <input type="checkbox" id="changeForm" onchange="updateForm(this)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group" id="login_nama">
                                                    <label for="login_nama" class="form-label">Nama Lengkap</label>
                                                    <input name="login_nama" type="text" class="form-control"
                                                        id="login_nama" aria-describedby="login_nama"required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group" id="login_username">
                                                    <label for="login_username" class="form-label">Username</label>
                                                    <input name="login_username" type="text" class="form-control"
                                                        id="login_username" aria-describedby="login_username"
                                                        oninput="this.value = this.value.toUpperCase()" required>
                                                    <div id="login_username" class="form-text text-sm">
                                                        <span style="color:red;">*</span> Jumlah maks karakter 5, cukup
                                                        masukkan 5 Digit nomor karyawan untuk username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group" id="login_jabatan">
                                                    <label for="login_jabatan" class="form-label">Jabatan</label>
                                                    <input name="login_jabatan" type="text" class="form-control"
                                                        id="login_jabatan" aria-describedby="login_jabatan">
                                                    <div id="login_jabatan" class="form-text text-sm">
                                                        <span style="color:red;">*</span> Contoh : SPV IT
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group" id="login_level">
                                                    <label for="login_level">Departement / Divisi</label>
                                                    <select name="divisi_id" id="login_level" class="form-control">
                                                        <option value="">-- Departement / Divisi --</option>
                                                        @foreach ($divisi as $divs)
                                                            <option value="{{ $divs->id }}">{{ $divs->divisi_nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group" id="login_level">
                                                    <label for="login_level">Pilih Role / Level Akses</label>
                                                    <select name="login_level" id="login_level" class="form-control">
                                                        <option value="">-- Pilih Role / Level Akses --</option>
                                                        <option value="ho">KANTOR PUSAT</option>
                                                        <option value="pj">PENANGGUNG JAWAB / DIREKSI / LEADER</option>
                                                        <option value="sp">USER / ANGGOTA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group" id="login_email">
                                                    <label for="login_email" class="form-label">Email</label>
                                                    <input name="login_email" type="email" class="form-control"
                                                        id="login_email" aria-describedby="login_email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group" id="login_email">
                                                    <label for="login_no_telepon" class="form-label">HP / No.
                                                        Telepon</label>
                                                    <input name="login_no_telepon" type="number" class="form-control"
                                                        id="login_no_telepon" aria-describedby="login_no_telepon"
                                                        maxlength="14">
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="row mb-1 mt-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-lg btn-info" data-toggle="modal"
                                                    data-target="">
                                                    Input Data
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#changeForm').on('change', function() {
                if ($(this).prop('checked')) {
                    // Jika checkbox dicentang, ubah form sesuai dengan kebutuhan

                    // Hapus aturan oninput dan reset maxlength pada login_username
                    $('#login_username input').removeAttr('oninput').removeAttr('maxlength');

                    // Set input login_jabatan ke disabled dan set value ke "Head Office"
                    $('#login_jabatan input').prop('disabled', true).val('Head Office');

                    // Set nilai default untuk select divisi_id ke 26 dan disable divisi select
                    $('#login_level').val('26').prop('disabled', true);
                } else {
                    // Jika checkbox tidak dicentang, kembalikan pengaturan seperti semula

                    // Set kembali aturan oninput dan maxlength pada login_username
                    $('#login_username input').attr('oninput', 'this.value = this.value.toUpperCase()')
                        .attr('maxlength', '5');

                    // Enable kembali input login_jabatan dan kosongkan nilainya
                    $('#login_jabatan input').prop('disabled', false).val('');

                    // Reset select divisi_id ke kosong dan enable kembali
                    $('#login_level').val('').prop('disabled', false);
                }
            });
        });
    </script>
@endpush
