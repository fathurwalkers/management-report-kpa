@extends('layouts.dashboard-layout')

@section('title', 'Beranda - PT. Kartika Prima Abadi')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <form id="laporan-form" action="{{ route('proses-laporan') }}" method="POST">

                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group" id="login_username">
                                                    <label for="login_username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="login_username" aria-describedby="login_username" maxlength="5" oninput="this.value = this.value.toUpperCase()" required autofocus>
                                                    <div id="login_username" class="form-text text-sm">
                                                        <span style="color:red;">*</span> Jumlah maks karakter 5, cukup masukkan 5 Digit nomor karyawan untuk username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group" id="login_jabatan">
                                                    <label for="login_jabatan" class="form-label">Level / Role Akses</label>
                                                    <input type="text" class="form-control" id="login_jabatan" aria-describedby="login_jabatan">
                                                    <div id="login_jabatan" class="form-text text-sm">
                                                        <span style="color:red;">*</span> Contoh : SPV IT
                                                    </div>
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
                                                    <input type="email" class="form-control" id="login_email" aria-describedby="login_email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group" id="login_email">
                                                    <label for="login_no_telepon" class="form-label">HP / No. Telepon</label>
                                                    <input type="number" class="form-control" id="login_no_telepon" aria-describedby="login_no_telepon" maxlength="14">
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="row mb-1 mt-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-lg btn-info" data-toggle="modal" data-target="">
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
@endpush
